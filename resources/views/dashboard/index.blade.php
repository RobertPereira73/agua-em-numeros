@extends('Body.index')

@section('title', 'Dashboard')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    <div class="w-100 mb-4 d-flex align-items-center justify-content-between">
        <div class="col-4">
            <h2 class="colorWhite roboto">Dashboard</h2>
            <p class="colorWhite roboto">Aqui está sua análise de interações com repositórios</p>
        </div>

        <div class="col-1">
            <x-button type="button" :class="'bgPrimaryMd px-0 d-flex align-items-center justify-content-center'">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                    <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                </svg>
                <span class="ms-1 font12">Filtros</span>
            </x-button>
        </div>
    </div>

    <div class="row h-auto">
        <div class="col-6 d-flex justify-content-between flex-wrap">
            <x-card-countable/>
            <x-card-countable/>
            <x-card-countable/>
            <x-card-countable/>
        </div>

        <div class="col-6 colorWhite">
            <h1>grafico</h1>
        </div>
    </div>

    <div class="w-100 d-flex mt-3">
        <div class="col-8 bgPrimaryMd tableUsers p-2">
            <p class="colorWhite roboto">Usuário com mais commits</p>


        </div>
    </div>

@endsection