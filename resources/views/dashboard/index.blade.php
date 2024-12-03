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

    <div class="row mb-4 h-auto">
        <div class="col-12 d-flex justify-content-between flex-wrap">
            <x-card-countable :idCount="'users'" :title="'Usuários'"/>
            <x-card-countable :idCount="'repositories'" :title="'Repositórios'"/>
            <x-card-countable :idCount="'commits'" :title="'Commits'"/>
            <x-card-countable :idCount="'issues'" :title="'Discussões'"/>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-8">
            <div id="lineChart" class="chart px-3 py-2 w-100 bgPrimaryMd borderRadius">
                <x-loading-spinner/>
            </div>
        </div>

        <div class="col-4">
            <div id="pizzaChart" class="chart px-3 py-2 w-100 bgPrimaryMd borderRadius">
                <x-loading-spinner/>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <div id="barChart" class="chart px-3 py-2 w-100 bgPrimaryMd borderRadius">
                <x-loading-spinner/>
            </div>
        </div>
    </div>
@endsection