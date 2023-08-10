<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pre = Prescription::all();
        return response($pre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Date::find($request->DateId);
        if($date === null)
            return response()->json(['error' => 'object not found']);
        $prescription = Prescription::create($request->all());
        return response($prescription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prescription = Prescription::find($id);
        if($prescription === null)
            return response()->json(['error' => 'object not found']);
        return response($prescription);
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
        $prescription = Prescription::find($id);
        if($prescription === null)
            return response()->json(['error' => 'object not found']);
        $result = $prescription->update($request->all());
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
        $prescription = Prescription::find($id);
        if($prescription === null)
            return response()->json(['error' => 'object not found']);
        $result = $prescription->delete();
        return response($result);
    }
}
