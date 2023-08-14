<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations = Appointments::paginate(10);
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
            'Doctor_id' => 'required',
            'Patient_id' => 'required',
            'BookTime' => 'required|date'
        ]);
        if(Doctor::find($request->Doctor_id) && Patient::find($request->patient_id))
        {
            $date = Appointments::create($request->all());
            return response($date);
        }
        return response()->json(['error','Doctor Or Patient not exist']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Appointments::find($id)){
            $date = Appointments::find($id);
            return response($date);
        }
        return response()->json(['error' , 'the date not exists']);
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
        if(Appointments::find($id))
        {
            $request->validate([
                'Doctor_id' => 'required',
                'Patient_id' => 'required',
                'BookTime' => 'required|date'
            ]);
            if(Doctor::find($request->Doctor_id) && Patient::find($request->patient_id))
            {
                $date = Appointments::find($id)->update($request->all());
                return response($date);
            }
            return response()->json(['error','Doctor Or Patient not exist']);
        }
        return response()->json(['error','Date not exist']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Appointments::find($id)){
            $result = Appointments::find($id)->delete();
            return response($result);
        }
        return response()->json(['error' , 'the date not exists']);
    }
}
