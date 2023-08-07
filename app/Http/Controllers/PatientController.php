<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Patient;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::all();
        return response($patient);
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
            'Email' => 'email|required',
            'Address_id' => 'required'
        ]);
        if(Address::find($request->Address_id))
        {
            $patient = Patient::create($request->all());
            return response($patient);
        }
        return response()->json(['error' => 'the address is not exists']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Patient::find($id))
        {
            $patient = Patient::find($id);
            return response($patient);
        }
        return response()->json(['error' => 'the patient is not exists']);

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
        if(Patient::find($id))
        {
            $request->validate([
                'PhoneNumber' => 'digits_between:10,10',
                'Address_id' => 'required'
            ],[
                'PhoneNumber.digits_between' => 'phone number must be 10 digits'
            ]);
            if(Address::find($request->Address_id))
            {
                $patient = Patient::find($id)->update($request->all());
                return response($patient);
            }
            return response()->json(['error' => 'the address is not exists']);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Patient::find($id))
        {
            $patient = Patient::find($id)->delete();
            return response($patient);
        }
        return response()->json(['error' => 'the patient is not exists']);
    }
}
