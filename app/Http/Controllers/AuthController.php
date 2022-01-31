<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    
    public function auth(Request $req){

        $user = User::where('cpf', $req->cpf)->where('senha', $req->senha)->first();       

        if ($user) // se existir um usuário com essas informações
        {
            Auth::login($user); //efetuando a operação de autenticação
        }

        if (Auth::check())
        {
            return Redirect::route('login');
        }

    }

}
