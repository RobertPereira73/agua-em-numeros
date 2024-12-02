@extends('Body.index')

@section('title', 'Register')

@section('links')
    @parent
    {{-- <link rel="stylesheet" href="style.css"> --}}
@endsection

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <x-form route="register" class="w-25">
            <div class="mb-5 d-flex flex-column justify-content-center align-items-center">
                <h3 class="my-3 bold roboto colorWhite">
                    Cadastre-se
                </h3>
                <p class="mb-0 roboto colorWhite">
                    Já possui uma conta? 
                    <a href="{{ route('login') }}" class="colorWhite bold decorationNone">
                        Entrar
                    </a>
                </p>
            </div>

            <x-select-avatar :class="'mb-5'"/>

            <x-container-input :name="'nome'">
                <x-input name="nome" placeholder="Nome" type="text"/>
            </x-container-input>

            <x-container-input :name="'sobrenome'">
                <x-input name="sobrenome" placeholder="Sobrenome" type="text"/>
            </x-container-input>

            <x-container-input :name="'email'">
                <x-input name="email" placeholder="Email" type="email"/>
            </x-container-input>

            <x-container-input :name="'password'">
                <x-input name="password" placeholder="Senha" type="password"/>
            </x-container-input>

            <x-container-input :name="'password_confirmation'">
                <x-input name="password_confirmation" placeholder="Confirme a senha" type="password"/>
            </x-container-input>

            <x-button>
                Salvar
            </x-button>
        </x-form>
    </div>
@endsection