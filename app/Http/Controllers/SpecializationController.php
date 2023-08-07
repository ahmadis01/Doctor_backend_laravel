<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use PDO;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations = Specialization::all();
        return response($specializations);
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
            'Name' => 'required'
        ]);
        $specialization = Specialization::create($request->all());
        return response($specialization);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Specialization::find($id)){
            $specialization = Specialization::find($id);
            return response($specialization);
        }
        return response()->json(['error' , 'the specialization not exists']);
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
        if(Specialization::find($id)){
            $request->validate([
                'Name' => 'required'
            ]);
            $specialization = Specialization::find($id)->update($request->all());
            return response($specialization);
        }
        return response()->json(['error' , 'the specialization not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Specialization::find($id)){
            $result = Specialization::find($id)->delete();
            return response($result);
        }
        return response()->json(['error' , 'the specialization not exists']);
    }
}
