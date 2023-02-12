<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use App\Models\User;
class CategoryController extends Controller
{
    // function to get all categories and reurn it in an array 
    public function index(){
        
        $categories = Category::get();
        $data = array();

        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        
        return view('category.index', ['categories' => $categories], compact('data'));
    }
}

