<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AuthService;
 

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login (Request $request)
    {
       return $this->authService->login($request);
    }

    public function logoff (Request $request)
    {
       return 'deslogou';
    }

}
