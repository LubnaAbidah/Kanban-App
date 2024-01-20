<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signupForm()
    {
        $pageTitle = 'Signup Page';
        return view('auth.signup_form', ['pageTitle' => $pageTitle ]);
    }

    public function signup()
    {

    }
}
