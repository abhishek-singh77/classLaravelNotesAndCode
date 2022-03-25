<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UriController extends Controller
{
    //
    public function index(Request $request){
        $path = $request->path();
        echo 'path: '.$path;
        echo '<br>';


        $patthern = $request->is('foo/*');
        echo "is('foo/*'): ".$patthern;
        echo '<br>';

        $isMethod_ = $request->isMethod('post');
        echo "isMethod('post'): ".$isMethod_;
        echo '<br>';

        if($request->isMethod('GET')){
            echo "This is the GET method";
        }
        else   {
            echo "This is not a GET method";
        }
        echo '<br>';

        $methodType = $request->method();
        echo 'method(): '.$methodType;
        echo '<br>';

        $url = $request->url();
        echo 'url(): '.$url;
        echo '<br>';

        $fullUrl = $request->fullUrl();
        echo 'fullUrl(): '.$fullUrl;
        echo '<br>'; //gives a query string http://127.0.0.1:8000/foo/bar?id=12
        // ?id=12 is the query string

        $routeIs_ = $request->routeIs('random'); //returns true or false if the route is named or not
        echo "routeIs('random'): ".$routeIs_; //returns 1 if route name is same as provided in the parameter.
        echo '<br>';

        $hasMethod_ = $request->hasMethod('post');
        echo 'hasMethod("post"): '.$hasMethod_;
        echo '<br>';

        


        $isAjax = $request->ajax();
        echo 'ajax(): '.$isAjax;
        echo '<br>';



    }
}
