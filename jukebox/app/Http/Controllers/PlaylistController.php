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
use App\Http\Controllers\SessionController;

class PlaylistController extends Controller
{
    
    // function to add songs to Session 
    public function addSong(Request $request){
        if(Session::has('loginId')){
            $sc = new SessionController();
            $sc->add($request);
        
        // app('App\Http\Controllers\SessionController')->add($request);
       
        }
        return back()->with('success','song has ben added');
    }


    // function to delete song from temporary Session playlist 
    public function deletePlaylist($id){
        
        if(Session::has('loginId')){
          
        app('App\Http\Controllers\SessionController')->delete($id);

        }
        return redirect('dashboard');
    }

    // function to send temporary Session playlist tp data base 
    public function savePlaylist(Request $request){
        if(Session::has('loginId')){
         
            $playlist = new Playlist;
            $playlist->name = $request->name;
            $playlist->user_id  = app('App\Http\Controllers\SessionController')->getID();
            $playlist->save();
            $maxId = Playlist::max('id');
            $selectedSongs = app('App\Http\Controllers\SessionController')->getList(); 
            foreach( $selectedSongs as $selected){
            $joinedTable = new Between;
            $joinedTable->song_id = $selected;
            $joinedTable->playlist_id = $maxId;
            

            $joinedTable->save();

        }
        app('App\Http\Controllers\SessionController')->deleteSession();
        return back()->with('success','your list has been submitied');
        }
    }

    // function to return playlists view with all requested data 
    public function playListsIndex(){
        $data = array();
        if(Session::has('loginId')){  
         $data = User::where('id','=',app('App\Http\Controllers\SessionController')->getID())->first();
         $between = Between::get();  
         $songs = Song::get();
         $playlists = Playlist::get();
        
        return view('playlists', compact('data','between','songs','playlists'));
        }
    }

    // function to delete a song from data base 
    public function deletePlaylistSong($id,$list){

        Between::where([
            ['playlist_id', '=', $list],
            ['song_id', '=', $id]
           
        ])->delete();
       
        return redirect('playlists');

    }

    // function to delete all the play list  and relative data from data base 
    public function deleteList($list){
        Between::where('playlist_id', '=', $list)->delete();
        Playlist::where('id', '=', $list)->delete();

        return redirect('playlists');

    }

    // function to change existed play list in data base 
    public function updateList(Request $request){
        
        Playlist::where('id',$request->id)->update(['name'=>$request->name]);
        return redirect('playlists');


    }

    // function to add new song to a playlist from data base 
    public function addSongToPlaylist(Request $request){
        $data = array();
        if(Session::has('loginId')){  
        $data = User::where('id','=',app('App\Http\Controllers\SessionController')->getID())->first();
        $between = new Between;
        $between->playlist_id = $request['playlistId'];
        $between->song_id = $request['getSong2'];
        $between->save();
        



        }
        return redirect('playlists');
    }


} 