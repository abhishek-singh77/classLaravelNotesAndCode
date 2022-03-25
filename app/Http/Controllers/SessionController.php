<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //setting the sessoin using put method
    public function storeSessionData(Request $request)
    {   
        //what is seesion() method?
        //it is a method of the request class
        //it is used to store data in the session
        //we are using put method to store the data in the session
        $request->session()->put('name', 'Taylor');
        $request->session()->put('password', 'secret');
        $request->session()->put('admin', true);
        //session(["name"=>Taylor, "password"=>secret, "admin"=>true]);
        //you can pass an array to the session() method
        //as a key value pair and it'll be stored in the session

        //$request->session()->push('name', 'John');
        //we can use push method too to store the data in the session
        //but it'll store the data in form of array
        //to get it use get with all method cuz you won't be able to get the data alone as 
        //it'll be in array format
        echo "Session data stored successfully";

    }

    //getting the session data using get method
    public function getSessionData(Request $request){
        return $request->session()->all();
        //all() method returns all the data in the session
        //you can use get method to retrieve the data from the session for a particular key
        //echo $request->session()->get('name');
    }

    //deleting the session data using delete method
    public function deleteSessionData(Request $request){
        $request->session()->forget('name');
        //forget() method removes the data from the session
        //forget() method accepts the key of the data to be removed
        echo "Session data deleted successfully";
        //to delete all the data you can use
        //$request->session()->flush();

        //you can aslo use pull method
        //$request->session()->pull('name', 'Taylor');
        //pull() method removes the data from the session
        //it accepts the key of the data to be removed
        //if the key is not found it will return null
        
    }
}
