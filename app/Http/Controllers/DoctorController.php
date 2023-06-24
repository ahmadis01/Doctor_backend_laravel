<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
            'PhoneNumber' => 'numeric|digits_between:10,10'
        ],
        [
            'PhoneNumber.digits_between' => 'phone number must be 10 digits'
        ]
    );
        $doctor = Doctor::create($request->all());
        return response($doctor);
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
        return response()->json(['error', 'this doctor not exists']);
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
}
