<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SongController;
use Session;
use DB;
use stdClass;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Between;
use App\Models\Song;
use PhpParser\Node\Expr\New_;

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
    public function savePlaylist(Request $request){
        if(Session::has('loginId')){
         
            $playlist = new Playlist;
            $playlist->name = $request->name;
            $playlist->save();
            $maxId = Playlist::max('id');
            $selectedSongs = Session::get('InPlayList'); 
            foreach( $selectedSongs as $selected){
            $joinedTable = new Between;
            $joinedTable->song_id = $selected;
            $joinedTable->playlist_id = $maxId;
            $joinedTable->save();

        }
         Session::pull('InPlayList');
        return back()->with('success','your list has been submitied');
        }
    }

    public function playListsIndex(){
        $data = array();
        if(Session::has('loginId')){  
         $data = User::where('id','=',Session::get('loginId'))->first();
         $between = Between::get();  
         $songs = Song::get();
         $playlists = Playlist::get();
        
        return view('playlists', compact('data','between','songs','playlists'));
        }
    }

    public function deletePlaylistSong($id,$list){

        Between::where([
            ['playlist_id', '=', $list],
            ['song_id', '=', $id]
           
        ])->delete();
       
        return redirect('playlists');

    }

    public function deleteList($list){
        Between::where('playlist_id', '=', $list)->delete();
        Playlist::where('id', '=', $list)->delete();

        return redirect('playlists');

    }

    public function updateList(Request $request){
        
        Playlist::where('id',$request->id)->update(['name'=>$request->name]);
        return redirect('playlists');


    }

    public function addSongToPlaylist(Request $request){
        $data = array();
        if(Session::has('loginId')){  
        $data = User::where('id','=',Session::get('loginId'))->first();
        $between = new Between;
        $between->playlist_id = $request['playlistId'];
        $between->song_id = $request['getSong2'];
        $between->save();
        



        }
        return redirect('playlists');
    }


} 