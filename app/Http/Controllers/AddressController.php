<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();
        return response($addresses);
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
            'City_id' => 'required',
        ]);
        if(City::find($request->City_id)){
            $address = Address::create($request->all());
            return response($address);
        }
        return response()->json(['error' => 'the city is not exists']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Address::find($id))
        {
            $address = Address::find($id);
            return response($address);
        }
        return response()->json(['error' => 'this address not exists']);
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
        if(Address::find($id))
        {
            $request->validate([
                'City_id' => 'required',
            ]);
            if(City::find($request->City_id))
            {
                $address = Address::find($id)->udpate($request->all());
                return response($address);   
            }
            return response()->json(['error' => 'the city is not exists']);
        }
        return response()->json(['error' => 'this address not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Address::find($id)){
            $address = Address::find($id)->delete();
            return response($address);
        }
        return response()->json(['error' => 'this address not exists']);
    }
    //get addresses by city id
    public function getAddressesByCityId($cityId){
        if(City::find($cityId)){
            $addresses = Address::where('City_id', $cityId)->get();
            return response($addresses);
        }
        return response()->json(['error' => 'this city not exists']);
    }
}
