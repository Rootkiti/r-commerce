<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class Authmanager extends Controller
{
    // login function

    function login(){
        return view(view:'login');
    }
    // login action
    function loginPost(Request $request){
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
            );
        
        $credentials = $request->only('email','password');
        if(Auth::Attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with('error', 'Invalid Credentials');
    }

    // registration function
    function registration(){
        return view(view:'registration');
    }

    // registration post
    function registrationPost(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required'
            ]
            );

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);

            $user = User::create($data);

            if(!$user){
                return redirect(route('registration'))->with('error', 'registration failed');
            }
            return redirect(route('login'))->with('success', 'Account Created!!');

            
    }

    // logout function

    function logout(Request $request){
        Session::flush();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
