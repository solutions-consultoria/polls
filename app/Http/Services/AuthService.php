<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
 

class AuthService {

    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function login (Request $request)
    {
       if ($request->cpf == '' || $request->login_token == '') {
        flash('Existem campos incompletos');
        return  response()->view('home');
       }
       
       //Searching for ADM user
       $user = $this->userModel->where('cpf', $request->cpf)->where('login_token', $request->login_token)->where('role', 99)->first();

       if (!$user) {
        flash('Não existe um admin com essas credenciais');
        return  response()->view('home');
       }

       session(['user' => $user, 'isLogado' => true]);

       return redirect()->route('admin.home');
    }

    public function logoff (Request $request)
    {
        $request->session()->flush();
        return redirect()->route('/');
    }
}
