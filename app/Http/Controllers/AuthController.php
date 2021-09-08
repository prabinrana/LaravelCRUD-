<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
Use Hash;

class AuthController extends Controller{
    public function  index(){
        return view('auth.SignIn');
    }

    public function createSignIn(Request $request)
    {
     $request->validate
     ([
       'email'=>'required',
       'password'=>'required',
     ]);
     $credentials =$request->only('email','password');
     if(Auth::attempt($credentials)){
         return redirect()->intended('products')->
         withSuccess('Logged-in');
     }
     return redirect('login')->withSuccess('Credentials are wrong');
    }
    public function signup()
    {
    return view('auth.signup');
    }

    public function customSignup(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);
        $data=$request->all();

        $check=$this->createUser($data);
        return redirect("dashboard")->withSuccess('Successfully logged-in');
    }

    public function createUser(array $data)
    {
        return User::create([
            'name'=>$data ['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public function dashboardView()
    {
     if(Auth::check()){
         return View('auth.dashboard');
     }
     return redirect("login")->withSuccess('Access Denied');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

}
