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

            <x-container-input :name="'nome'">
                <x-input name="nome" placeholder="Nome" type="text" :value="$user->name"/>
            </x-container-input>

            <x-container-input :name="'sobrenome'">
                <x-input name="sobrenome" placeholder="Sobrenome" type="text" :value="$user->middle_name"/>
            </x-container-input>

            <x-container-input :name="'email'">
                <x-input name="email" placeholder="Email" type="email"  :events="'disabled'" :value="$user->email"/>
            </x-container-input>

            <x-container-input :name="'oldPassword'">
                <x-input name="oldPassword" placeholder="Senha atual" :type="'password'" :events="'onblur=' . 'checkPassword(this)'"/>
            </x-container-input>

            <x-container-input :name="'password'">
                <x-input name="password" placeholder="Nova senha" type="password"/>
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