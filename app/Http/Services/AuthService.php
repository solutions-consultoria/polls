<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
 

class AuthService {

    private $usermodel;

    public function __construct(User $usermodel)
    {
        $this->usermodel = $usermodel;
    }

    public function login (Request $request)
    {
       if ($request->cpf == '' || $request->login_token == '') {
        flash('Existem campos incompletos');
        return  response()->view('home');
       }
       
       //Searching for ADM user
       $user = $this->usermodel->where('cpf', $request->cpf)->where('login_token', $request->login_token)->where('role', 99)->first();

       if (!$user) {
        flash('Não existe um admin com essas credenciais');
        return  response()->view('home');
       }

       session(['user' => $user, 'isLogado' => true]);

       return redirect()->route('admin.home');
    }
}
