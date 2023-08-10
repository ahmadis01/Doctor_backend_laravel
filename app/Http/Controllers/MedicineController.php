<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return response($medicines);
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
        $medicine = Medicine::create($request->all());
        return response($medicine);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        if($medicine === null)
            return response()->json(['error' => 'object not found']);
        return response($medicine);
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
        $medicine = Medicine::find($id);
        if($medicine === null)
            return response()->json(['error' => 'object not found']);
        $request->validate([
            'Name' => 'required'
        ]);
        $medicine = $medicine->update($request);
        return response($medicine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        if($medicine === null)
            return response()->json(['error' => 'object not found']);
        $result = $medicine->delete();
    }
}
