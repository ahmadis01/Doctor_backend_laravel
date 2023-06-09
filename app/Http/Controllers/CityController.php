<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return response($cities);
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
            'Name' => 'unique:Cities,Name'
        ],
        [
            'Name.unique' => 'This city is already exists'
        ]);
        $city = City::create($request->all());
        return response($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(City::find($id)){
            $city = City::find($id);
            return response($city);
        }
        return response()->json(['error' => 'this city not exists']);
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
        if(City::find($id))
        {
            $request->validate([
                'Name' => 'unique:Cities,Name'
            ],
            [
                'Name.unique' => 'This city is already exists'
            ]);
            $city = City::find($id)->update($request->all());
            return response($city);
        }
        return response()->json(['error' => 'this city not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(City::find($id))
        {
            $city = City::find($id)->delete();
            return response($city);
        }
        return response()->json(['error' => 'this city not exists']);
    }
}
