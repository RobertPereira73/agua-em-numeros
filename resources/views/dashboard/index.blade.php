@extends('Body.index')

@section('title', 'Dashboard')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"></script>
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
@endsection

@section('content')
    <div class="row mb-5 justify-content-between">
        <div class="col-6">
            <h2 class="colorWhite roboto">
                Dashboard
            </h2>
            <p class="roboto colorWhite">Aqui você vê as interações com os repositórios</p>
        </div>
    </div>

    <div class="row h-auto">
        <div class="col-12 d-flex justify-content-between flex-wrap">
            <x-card-countable :idCount="'users'" :title="'Usuários'"/>
            <x-card-countable :idCount="'repositories'" :title="'Repositórios'"/>
            <x-card-countable :idCount="'commits'" :title="'Commits'"/>
            <x-card-countable :idCount="'issues'" :title="'Discussões'"/>
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