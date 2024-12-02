<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\LoginService;
use App\Http\Services\RegisterService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        private Request $request,
        private RegisterService $registerService = new RegisterService(),
        private LoginService $loginService = new LoginService()
    )
    {}

    public function index() : View
    {
        return view('register.index');
    }

    public function register() : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $this->request->validate(
            [
                'email' => ['required', 'string', 'unique:users,email'],
                'nome' => ['required', 'string'],
                'sobrenome' => ['required', 'string'],
                'password' => ['required', 'min:6', 'confirmed']
            ],
            [
                'email.required' => "Campo email é obrigatório!",
                'email.string' => "Tipo do campo email é inválido!",
                'email.unique' => "Email já está sendo usado.",
                'nome.required' => "Campo de nome é obrigatório!",
                'nome.string' => "Tipo do campo nome é inválido!",
                'sobrenome.required' => "Campo de sobrenome é obrigatório!",
                'sobrenome.string' => "Tipo do campo sobrenome é inválido!",
                'password.required' => "Campo senha é obrigatório!",
                'password.min' => "Campo de senha deve ter, no mínimo, 6 caracteres!",
                'password.confirmed' => "Confirmação de senha diferente!"
            ]
        );

        $user = $this->registerService->register($this->request->all());
        $this->loginService->login($user);
        
        return response(['message' => true]);
    }
}
