<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use App\Models\User;
use Hash;
use Session;
use App\Models\Song;

class CustomerAuthController extends Controller
{
    
    // function to return login view
    public function login(){
        return view("auth.login");
    }

    // function to return registraation view
    public function registration(){
        return view("auth.registration");
    }

    // function to register a new user 
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success','you have been registerd');
        }else{
            return back()->with('fail', 'something went wrong');
        }
    }

    // function to login in a user + check
    public function loginUser(Request $request){
        $request->validate([
            
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $user = User::where('email','=', $request->email)->first();
        if($user){

            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','password is not matching.');
            }

        }else{
            return back()->with('fail','This email is not registerd.');
        }
    }

    // function to return a dashboard view with all requested data 
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $songs = Song::get();
            $terminalsongs = app('App\Http\Controllers\SessionController')->getList();
            $data = User::where('id','=',app('App\Http\Controllers\SessionController')->getID())->first();
        }
        return view('dashboard', compact('data', 'songs' ,'terminalsongs'));
        
    }

    // function to log out a user and return a view 
    public function logout(){
        if(Session::has('loginId')){
            app('App\Http\Controllers\SessionController')->deleteSessionId();
            app('App\Http\Controllers\SessionController')->deleteSession();
            
            return redirect('login');
        }
    }
}
