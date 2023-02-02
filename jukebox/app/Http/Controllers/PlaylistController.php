<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SongController;
use Session;
use App\Models\User;

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

    public function deletePlaylist($id){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $playlistSec = Session::get('InPlayList');

            $arSearsh = array_search($id, $playlistSec);
            $sesions = session()->pull('InPlayList',[]);



          if(($key = array_search($id, $sesions)) !== false){
            unset($sesions[$key]);
          }  

          session()->put('InPlayList', $sesions);
          return redirect('dashboard');



        }
    }
}
