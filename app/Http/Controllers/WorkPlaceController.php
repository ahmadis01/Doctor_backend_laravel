<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Doctor;
use App\Models\WorkPlace;
use Illuminate\Http\Request;

class WorkPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workplaces = WorkPlace::all();
        return response($workplaces);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Doctor::find($request->DoctorId) === null)
            return response()->json(['error' => 'Doctor not found']);
        if(Address::find($request->AddressId)=== null)
            return response()->json(['error' => 'Address not found']);
        $request->validate([
            'PlaceName' => 'required',
            'FromTime' => 'required',
            'ToTime' => 'required',
            'Day' => 'required'
        ]);
        $workPlace = Workplace::create($request->all());
        return response($workPlace);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workPlace = WorkPlace::find($id);
        if($workPlace === null)
            return response()->json(['error' => 'workPlace not found']);
        return response($workPlace);
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
        $workPlace = WorkPlace::find($id);
        if($workPlace === null)
            return response()->json(['error' => 'workPlace not found']);

        if(Doctor::find($request->DoctorId) === null)
            return response()->json(['error' => 'Doctor not found']);
        if(Address::find($request->AddressId))
            return response()->json(['error' => 'Address not found']);
        $request->validate([
            'PlaceName' => 'required',
            'FromTime' => 'required',
            'ToTime' => 'required',
            'Day' => 'required'
        ]);
        $result = $workPlace->update($request->all());
        return response($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workPlace = WorkPlace::find($id);
        if($workPlace === null)
            return response()->json(['error' => 'workPlace not found']);
        $result = $workPlace->delete();
        return response($result);
    }
}
