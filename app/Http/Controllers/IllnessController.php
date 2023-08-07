<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\Specialization;
use Illuminate\Http\Request;

class IllnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $illnesses = Illness::paginate(10);
        return response($illnesses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Type' => 'required',
            'Specialization_id' => 'required'
        ]);
        if(Specialization::find($request->Specialization_id))
        {
            $illness = Illness::create($request->all());
        }
        else
        {
            return response()->json(['error' => 'Specialization is not exists']);
        }
        return response($illness);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Illness::find($id))
        {
            $illness = Illness::find($id);
            return response($illness);
        }
        else
        {
            return response()->json(['error' => 'Illness is not exists']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Illness::find($id)){

            $request->validate([
                'Name' => 'required',
                'Type' => 'required',
                'Specialization_id' => 'required'
            ]);
            if(Specialization::find($request->Specialization_id))
            {
                $illness = Illness::find($id)->update($request->all());
            }
            else
            {
                return response()->json(['error' => 'Specialization is not exists']);
            }
            $specialization = Specialization::find($id)->update($request->all());
            return response($specialization);
        }
        return response()->json(['error' , 'the Illness not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Illness::find($id)){
            $result = Illness::find($id)->delete();
            return response($result);
        }
        return response()->json(['error' , 'the Illness not exists']);
    }
}
