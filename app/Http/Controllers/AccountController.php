<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required|confirmed',
            'AccountType' => 'required'
        ]);
        if($request->AccountType == 'patient' && Patient::where('Email',$request->Email)->count() > 0)
            return response()->json(['error' => 'this Email Has been taken']);
        if($request->AccountType == 'doctor' && Doctor::where('Email',$request->Email)->count() > 0)
            return response()->json(['error' => 'this Email Has been taken']);

        if($request->AccountType == 'patient')
        {
            $account = Patient::create($request->all());

        }else
        {
            $account = Doctor::create($request->all());
        }
        return response($account);
    }
    
    public function login(Request $request)
    {
        if($request->AccountType == 'patient')
        {
            $account = Patient::where('Email',$request->Email)->first();
            if($account->Password == $request->Password)
                return response($account);
            else
                return response()->json(['error' => 'user not found'],400);
        }else 
        {
            $account = Doctor::where('Email',$request->Email)->first();
            if($account->Password == $request->Password)
                return response($account);
            else
                return response()->json(['error' => 'user not found'],400);
        }
    }
}
