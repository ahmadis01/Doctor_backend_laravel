<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return response($doctors);
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
            'PhoneNumber' => 'numeric|digits_between:10,10',
            'Specialization_id' => 'required'
        ],
        [
            'PhoneNumber.digits_between' => 'phone number must be 10 digits'
        ]);
        if(Specialization::find($request->Specialization_id))
        {
            $doctor = Doctor::create($request->all());
            return response($doctor);
        }else{
            return response()->json(['error' => 'Specialization not exists']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Doctor::find($id)){
            $doctor = Doctor::find($id);
            return response($doctor);
        }
        return response()->json(['error' => 'this doctor not exists']);
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
        if(Doctor::find($id)){
            $request->validate([
                'Name' => 'required',
                'PhoneNumber' => 'numeric|digits_between:10,10'
            ],
            [
                'PhoneNumber.digits_between' => 'phone number must be 10 digits'
            ]);
            $doctor = Doctor::find($id)->update($request->all());
            return response($doctor);
        }
        return response()->json(['error' => 'this doctor not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Doctor::find($id)){
            $doctor = Doctor::find($id)->delete();
            return response($doctor);
        }
        return response()->json(['error' => 'this doctor not exists']);
    }
    public function GetDoctorsBySpecializationId($specialization_id)
    {
        $specialization = Specialization::find($specialization_id);
        if($specialization === null)
            return response()->json(['error' => 'specialization not found']);
        $doctors = Doctor::where('Specialization_id', $specialization_id)->get();
        return response($doctors);
    }
}
