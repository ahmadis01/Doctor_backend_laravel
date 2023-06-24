<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laborataries = Laboratory::all();
        return response($laborataries);
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
            'PhoneNumber' => 'digits_between:10,10',
            'Address_id' => 'required'
        ],[
            'PhoneNumber.digits_between' => 'phone number must be 10 digits'
        ]);
        if(Address::find($request->Address_id))
        {
            $laboratory = Laboratory::create($request->all());
            return response($laboratory);
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
        if(Laboratory::find($id))
        {
            $laboratory = Laboratory::find($id);
            return response($laboratory);
        }
        return response()->json(['error' => 'the laboratory is not exists']);
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
        if(Laboratory::find($id))
        {
            $request->validate([
                'PhoneNumber' => 'digits_between:10,10',
                'Address_id' => 'required'
            ],[
                'PhoneNumber.digits_between' => 'phone number must be 10 digits'
            ]);
            if(Address::find($request->Address_id))
            {
                $laboratory = Laboratory::find($id)->update($request->all());
                return response($laboratory);
            }
            return response()->json(['error' => 'the address is not exists']);

        }
        return response()->json(['error' => 'the laboratory is not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Laboratory::find($id))
        {
            $result = Laboratory::find($id)->delete();
            return response($result);
        }
        return response()->json(['error' => 'the laboratory is not exists']);
    }
}
