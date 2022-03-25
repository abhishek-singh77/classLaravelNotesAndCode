<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    //
    public function postRegister(Request $request){
        //retrieve the form data
        $name = $request->input('name');
        echo 'Name: '.$name;
        echo '<br>';
        //echo $request->has('name');
        /* if($request->has('name')){
            echo 'Name is present';
        }
        else{
            echo 'Name is not present';
        } */
        $email = $request->input('email');
        echo 'Email: '.$email;
        echo '<br>';

        /* $password = $request->input('password');
        echo 'Password: '.$password;
        echo '<br>'; */

        $password = $request->password;
        echo 'Password: '.$password;
        echo '<br>';
/* 
        if($request->has('password')){
            echo 'Password is present';
        }
        else{
            echo 'Password is not present';
        }
 */     
        echo "<br><br>";
        if($request->has([
            'name',
            'email',
            'password'
        ])){
            echo 'All fields are present';
        }
        else{
            echo 'All fields are not present';
        }

        echo "<br><br>";
        if($request->hasAny([
            'name',
            'email',
            'password'
        ])){
            echo 'At least one field is present';
        }
        else{
            echo 'At least one field is not present';
        }

        echo "<br><br>";

        if($request->filled('name')){
            echo 'Name is filled';
        }
        else{
            echo 'Name is not filled';
        }

        echo "<br><br>";

        echo $request->missing('name');
        if($request->missing('username')){
            echo 'UserName is missing';
        }
        else{
            echo 'UserName is not missing';
        }
        echo "<br><br>";

        if($request->whenHas('name', function($input){
            echo "name is found with whenHas".$input;
            
        }));
        else{
            echo "name is not found with whenHas";
        }

        echo "<br><br>";

    }
}
