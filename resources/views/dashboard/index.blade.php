@extends('Body.index')

@section('title', 'Dashboard')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"></script>
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
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
            <div id="main" class="w-100 h-100 bgPrimaryMd borderRadius">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-7">
            <div class="w-100 bgPrimaryMd p-3 tableUsers">
                <p class="colorWhite roboto">Top usuários</p>
    
                <table class="table">
                    <thead>
                        <tr>
                            <td class="colorWhite roboto bold font12">Usuario</td>
                            <td class="colorWhite roboto bold font12">Repositórios</td>
                            <td class="colorWhite roboto bold font12">Commits</td>
                            <td class="colorWhite roboto bold font12">Comments</td>
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td class="colorWhite roboto bold font12">Teste</td>
                            <td class="colorWhite roboto bold font12">1</td>
                            <td class="colorWhite roboto bold font12">1</td>
                            <td class="colorWhite roboto bold font12">1</td>
                        </tr>
    
                        <tr>
                            <td class="colorWhite roboto bold font12">Teste 2</td>
                            <td class="colorWhite roboto bold font12">2</td>
                            <td class="colorWhite roboto bold font12">2</td>
                            <td class="colorWhite roboto bold font12">2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-5">
            <div class="w-100 h-100 bgPrimaryMd p-3 borderRadius">
                <div id="pizzaChart" class="w-100 h-100"></div>
            </div>
        </div>
    </div>

@endsection