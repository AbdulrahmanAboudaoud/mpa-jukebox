<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use App\Models\User;
use Hash;
use Session;

class CustomerAuthController extends Controller
{
    public function login(){
        return view("auth.login");

    }
    public function registration(){
        return view("auth.registration");
    }
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
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            session::pull('loginId');
            return redirect('login');
        }
    }
}
