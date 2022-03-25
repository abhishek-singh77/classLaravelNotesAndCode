<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
//get the cookie class
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    //cookie method to set cookie
    public function setCookie(Request $request){
        //we are giving a response as cookie is set
        $response = new Response('Cookie is set');
        $response->cookie('name', 'lpu', 1);
        $response->withCookie(cookie('class', 'abc', 1));
        //above we added a cookie to the response
        //we gave value lpu to the name and it'll be there for 1 minute

        return $response;
        echo '<br><br>'.$response;
    }

    public function getCookie(Request $request){
        echo $request->cookie('name');
        echo '<br><br>'.$request->cookie('class');
        //for accessing the cookie we use the request object and we use the cookie method
        //we give the name of the cookie as a parameter
    }

    public function deleteCookie(Request $request){
        $response = new Response('Cookie is deleted');
        //$response->withCookie('name');
        //we can also delete the cookie by giving the name as a parameter
        $response->withCookie('name', null, -1);
        //$repomse->withCookie('name', '', -1);   works too
        //$response->withCookie('name', 0, -1);   works too
        //above we didn't gave any value to the cookie so it'll be deleted
        return $response;
    }
    

}
