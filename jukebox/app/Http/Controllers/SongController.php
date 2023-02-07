<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Session;
use App\Models\User;
class SongController extends Controller
{
    public function index($id){
        $songs = Song::get();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $playlistname = Session::get('PlayList');
        }
      
        return view('song.index', ['songs' => $songs ], compact('id', 'data','playlistname'));
        
    }
}
