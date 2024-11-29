@extends('Body.index')

@section('title', 'Register')

@section('links')
    @parent
    {{-- <link rel="stylesheet" href="style.css"> --}}
@endsection

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <x-form route="register" class="w-35">
            <div class="mb-5 d-flex flex-column justify-content-center align-items-center">
                <h3 class="my-3 bold roboto colorWhite">
                    Cadastra-se
                </h3>
                <p class="mb-0 roboto colorWhite">
                    Já possui uma conta? 
                    <a href="{{ route('login') }}" class="colorWhite bold decorationNone">
                        Entrar
                    </a>
                </p>
            </div>

            <x-select-avatar :class="'mb-5'"/>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="nome" placeHolder="Nome" type="text"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="sobrenome" placeHolder="Sobrenome" type="text"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="email" placeHolder="Email" type="email"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="password" placeHolder="Senha" type="password"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="password_confirmation" placeHolder="Confirme a senha" type="password"/>
                </div>
            </div>

            <x-button>
                Salvar
            </x-button>
        </x-form>
    </div>
@endsection