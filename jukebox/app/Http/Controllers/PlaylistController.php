<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class PlaylistController extends Controller
{
    public function createPlayList(Request $request){
        if(Session::has('loginId')){
            $request->session()->push('PlayList', $request['name']);
            return redirect('dashboard');
            
                }
    }
}
