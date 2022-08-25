<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function loginForm()
    {
        return view('auth.login');
    }

    function login()
    {
        
    }

    function registerForm()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required|min:11|max:14|unique:users,phone_number',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();           
        }

        try{
            User::insert([
                'name' => $request->input('name'),
                'email' => strtolower($request->input('email')),
                'phone_number' => $request->input('phone_number'),
                'password' => Hash::make($request->input('password')),
                'email_varification_token' => uniqid(time(),true) . Str::random(16),
                'created_at' => Carbon::now(),
            ]);

            $this->successMessage('User Rsgistration Successfully');
            return redirect()->route('frontend.login');
        } 
        catch(Exception $e){
            $this->errorMessage($e->getMessage());
            return redirect()->back();
        }
    }

    function logout()
    {
        
    }
}
