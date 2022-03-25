<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show()
    {
        return "This is the profile page";
    }
    public function verifyuser()
    {
        return redirect()->route('profile');
    }
    public function check()
    {
        
        return redirect()->route('userProfile', ['id'=>1, 'name'=>'John']);
    }
    public function check1($id, $name)
    {
        return redirect()->route('userProfile', compact('id', 'name'));
        return "I am a user ".$name." And my Id is".$id;
    }
}
