<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function show($id)
    {
        return 'show users '.$id;
    }

    public function login_page()
    {

        return view('loginpages.login',['name'=>'Kalded']);
    }

}
