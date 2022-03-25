<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //method to get all posts from the database
    public function getPost(){
        $posts = DB::table('posts')->get();
        return view('posts', compact('posts'));
    }
    
    public function addPost(){
        return view('add-post');
    }

    //method to insert post in the database from the form
    public function addPostSubmit(Request $request){
        $title = $request->input('title');
        $body = $request->input('body');
        DB::table('posts')->insert(['title'=>$title, 'body'=>$body]);
        return redirect('/posts');
    }
    
    
}


