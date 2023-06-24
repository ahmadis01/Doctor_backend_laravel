<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $analyses = Analysis::all();
         return response($analyses);
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
        $analysis = Analysis::create($request->all());
        return response($analysis);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Analysis::find($id)){
            $analysis = Analysis::find($id);
            return response($analysis);
        }
        return response()->json(['error' => 'the analysis is not exists']);
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
        if(Analysis::find($id)){
            $request->validate([
                'Name' => 'required'
            ]);
            $result = Analysis::find($id)->update($request->all());
            response($result);
        }
        return response()->json(['error' => 'the analysis is not exists']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Analysis::find($id))
        {
            $result = Analysis::destroy($id);
            return response($result);
        }
        return response()->json(['error' => 'the analysis is not exists']);
    }
}
