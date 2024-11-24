@extends('Body.index')

@section('title', 'Login')

@section('links')
    @parent
    {{-- <link rel="stylesheet" href="style.css"> --}}
@endsection

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <x-form route="login" class="w-35">
            @csrf

            <div class="mb-5 d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('images/logo-3.png') }}" alt=""
                    class="w-50"
                    style="
                        max-height: 20vh;
                    "
                >
                <h3 class="my-3 bold roboto colorWhite">
                    Bem-vindo!
                </h3>
                <p class="mb-0 roboto colorWhite">
                    Ainda não possui uma conta? 
                    <a href="{{ route('register') }}" class="colorWhite bold decorationNone">
                        Cadastre-se
                    </a>
                </p>
            </div>

            <div class="col-12 mb-3 d-flex flex-column">
                <x-input name="email" placeHolder="Email" type="email"/>
            </div>

            <div class="mb-3 d-flex flex-column">
                <x-input name="password" placeHolder="Senha" type="password"/>
            </div>

            <x-button>
                Entrar
            </x-button>
        </x-form>
    </div>
@endsection