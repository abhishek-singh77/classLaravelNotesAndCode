<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewerController extends Controller
{
    //Fetch the query string from the given url
    //let's say the url is http://localhost:8000/viewer?name=John&age=20
    public function index(Request $request){
        $name = $request->query('name', 'Abhi');
        //Abhi will show if name is not provided in the query string

        echo 'viewr name: '.$name;
        echo '<br>';
        $class = $request->query('class', 'A');
        echo 'viewer class: '.$class;
        echo '<br>';
}
}