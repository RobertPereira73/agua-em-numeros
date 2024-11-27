<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\LoginService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        private Request $request,
        private LoginService $loginService = new LoginService()
    )
    {}

    public function index() : View
    {
        return view('login.index');
    }

    public function login() : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $this->request->validate(
            [
                'email' => ['required', 'exists:users,email'],
                'password' => ['required']
            ],
            [
                'email.required' => "Campo de email é obrigatório!",
                'email.exists' => "Email não encontrado!",
                'password.required' => "Campo de senha é obrigatório!"
            ]
        );

        $values = $this->request->all();
        $this->loginService->authenticateCred($values['email'], $values['password']);

        return response(true);
    }
}
