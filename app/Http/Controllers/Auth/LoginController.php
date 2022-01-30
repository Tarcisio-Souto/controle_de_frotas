<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LoginController extends Controller
{
    
    public function showLoginForm() {

        if (Auth::check())
        {
            return Redirect::route('home');
        } else {

            return Inertia::render('Login.vue');

        }        

    }

    public function logout() {

        if (Auth::check())
        {
            Auth::logout();
            return Redirect::route('login');
        }        

    }


}
