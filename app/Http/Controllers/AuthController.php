<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller

{
    public function showSignupForm()
    {
        return view('auth.signup'); // Crée cette vue ensuite
    }
}


