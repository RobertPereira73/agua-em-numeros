<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\LoginService;
use App\Http\Services\RegisterService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct(
        private Request $request,
        private LoginService $loginService = new LoginService(),
        private RegisterService $registerService = new RegisterService()
    )
    {
        
    }

    public function index() : View
    {
        $user = auth()->user();

        return view('account.index', ['user' => $user]);
    }

    public function update()
    {
        $this->request->validate(
            [
                'id' => ['required', 'exists:users,id'],
                'nome' => ['required'],
                'sobrenome' => ['required'],
                'password' => ['confirmed', 'nullable', 'min:6']
            ],
            [
                'id.required' => "Usuário não encontrado!",
                'id.exists' => 'Usuário não encontrado!',
                'nome.required' => 'Campo nome é obrigatório',
                'sobrenome.required' => 'Campo sobrenome é obrigatório',
                'password.confirmed' => "Confirmação de senha diferente!",
                'password.min' => "Campo de senha deve ter, no mínimo, 6 caracteres!",
            ]
        );

        return $this->registerService->register($this->request->all());

        return $this->request;
    }

    public function checkPassword()  : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $requestPassword = $this->request->password;
        $userPassword = auth()->user()->password;

        $check = $this->loginService->validatePassword($requestPassword, $userPassword);

        return response(['message' => $check]);
    }
}
