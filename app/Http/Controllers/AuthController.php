<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function loginForm()
    {
        $pageTitle = 'Login';
        return view('auth.login_form', ['pageTitle' => $pageTitle]);
    }
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required',
            ],
            $request->all()
        );
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
    
        return redirect()
            ->back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
    }
    
    public function signupForm()
    {
        $pageTitle = 'Signup';
        return view('auth.signup_form', ['pageTitle' => $pageTitle]);
    }

    public function signup(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users'],
                'password' => 'required',
            ],
            [
                'email.unique' => 'The email address is already taken.',
            ],
            $request->all()
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
