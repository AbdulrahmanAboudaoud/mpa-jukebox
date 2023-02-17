<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;
use Session;
use App\Models\User;
use App\Http\Controllers\SessionController;

class SongController extends Controller
{
     // function to get all songs and reurn it in an array 

    public function index($id){
        
        $songs = Song::get();
        $data = array();

        if(Session::has('loginId')){
            
            $data = User::where('id','=',app('App\Http\Controllers\SessionController')->getID())->first();
            $playlistname = app('App\Http\Controllers\SessionController')->getplName();
            $exPlayLists = Playlist::get();
        }
      
        return view('song.index', ['songs' => $songs ], compact('id', 'data','playlistname','exPlayLists'));
        
    }
}
