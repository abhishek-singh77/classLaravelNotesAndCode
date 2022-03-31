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

    public function getPostById($id){
        $post = DB::table('posts')->where('id', $id)->first();
        //what first() returns is an object of the first row with the given id
        return view('post', compact('post'));
        //compact() is a function that takes an array of variables and returns an 
        //array with the variables as keys and the values as values    
    }

    public function editPostById($id){
        $post = DB::table('posts')->where('id', $id)->first();
        return view('edit-post', compact('post'));
    }
    public function updatePost(Request $request){
        $id = $request->input('id');
        $title = $request->input('title');
        $body = $request->input('body');
        DB::table('posts')->where('id', $id)->update(['title'=>$title, 'body'=>$body]);
        return redirect('/posts');
    }

    public function deletePost($id){
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/posts');
    }

    
    
}


