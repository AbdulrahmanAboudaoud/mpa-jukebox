<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class SessionController extends Controller
{
    public function add(Request $request){
            
        $request->session()->push('InPlayList' ,$request['getSong']);
       
    }


    public function delete($id){
        
            $data = User::where('id','=',Session::get('loginId'))->first();
            $playlistSec = Session::get('InPlayList');
            $arSearsh = array_search($id, $playlistSec);
            $sesions = session()->pull('InPlayList',[]);
         
            if(($key = array_search($id, $sesions)) !== false){
               unset($sesions[$key]);
            }  

             session()->put('InPlayList', $sesions);
             
    }




    public function getID(){
        
        $id = Session::get('loginId');
        return $id;
       
        
    }

    public function getList(){
        
       $list = Session::get('InPlayList');
       return $list;
    }

    public function getplName(){
     
        $name =Session::get('PlayList');
        return $name;
    }
    
    public function deleteSession(){
        
        session::pull('InPlayList');

    }
    
    public function deleteSessionId(){
        
        session::pull('loginId');
        
    }

}
