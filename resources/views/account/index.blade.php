@extends('Body.index')

@section('title', 'Meu perfil')

@section('links')
    @parent
    <script src="{{ asset('js/account/account.js') }}"></script>
@endsection

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <x-form route="account" class="w-35">
            <input name="id" type="hidden" value="{{ $user?->id }}">

            <div class="mb-5 d-flex flex-column justify-content-center align-items-center">
                <h3 class="my-3 bold roboto colorWhite">
                    Altere seus dados
                </h3>
            </div>

            <x-select-avatar :class="'mb-5'"/>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="nome" placeHolder="Nome" :value="$user->name"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="sobrenome" placeHolder="Sobrenome" :value="$user->middle_name"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input placeHolder="Email" :value="$user->email" :events="'disabled'"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input placeHolder="Senha atual" :type="'password'"
                        :events="'onblur=' . 'checkPassword(this)'"
                    />
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="password" placeHolder="Nova senha" :type="'password'"/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 d-flex flex-column">
                    <x-input name="password_confirmation" placeHolder="Confirme a senha" :type="'password'"/>
                </div>
            </div>

            <x-button>
                Salvar
            </x-button>
        </x-form>
    </div>
@endsection