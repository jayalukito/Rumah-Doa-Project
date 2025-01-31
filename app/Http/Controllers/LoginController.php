<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function dologin(Request $request){

        $credentials = $request->validate([
            'email' =>'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['password'=> $request->password,'email'=>$request->email])){
            if(Auth::user()->status == 1){
                return redirect('/admin/reservasi');
            }
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }

    public function doregister(Request $request){



        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required|unique:users,phone',
            'password'=>'required|min:6|confirmed',
        ]);



        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'status'=> 0,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt([
            'password' => $request->password,
            'email' => $request->email,
        ]);

        return redirect('/');
    }

}
