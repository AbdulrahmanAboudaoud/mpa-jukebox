<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SongController;


use Session;

class PlaylistController extends Controller
{
    public function createPlayList(Request $request){
        if(Session::has('loginId')){
            $request->session()->push('PlayList', $request['name']);
            
            return redirect('dashboard');
            
                }
    }
    public function addSong(Request $request){
        if(Session::has('loginId')){
            
        $request->session()->push('InPlayList' ,$request['getSong']);
       
         return back()->with('success','song has ben added');
        }
        
    }
}
