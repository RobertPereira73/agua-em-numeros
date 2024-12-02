@extends('Body.index')

@section('title', 'Repositórios')

@section('links')
    @parent
@endsection

@section('content')
    <div class="row justify-content-between">
        <div class="col-6">
            <h2 class="colorWhite roboto">
                Repositórios
            </h2>
        </div>

        <div class="col-2">
            <x-button type="button" class="d-flex align-items-center justify-content-center bg-primary" data-bs-toggle="modal" data-bs-target="#modalRepositories"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-2 bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
                <span>Criar repositório</span>
            </x-button>
        </div>
    </div>

    <hr class="mt-3 mb-5" style="background: white">

    <div class="row mb-5">
        <div class="col-12">
            <x-form route="repositories" class="w-100 bgNone p-0">
                <x-search-button :name="'search'" :placeholder="'Busque pelo repositório'"/>
            </x-form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="w-100">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="colorWhite roboto bold">Usuario</th>
                            <th class="colorWhite roboto bold">Repositórios</th>
                            <th class="colorWhite roboto bold">Commits</th>
                            <th class="colorWhite roboto bold">Comments</th>
                            <th class="colorWhite roboto bold">Ações</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td class="colorWhite roboto bold font12">Teste</td>
                            <td class="colorWhite roboto bold font12">1</td>
                            <td class="colorWhite roboto bold font12">1</td>
                            <td class="colorWhite roboto bold font12">1</td>
                            <td>
                                <div class="w-100 d-flex">

                                </div>
                            </td>
                        </tr>
    
                        <tr>
                            <td class="colorWhite roboto bold font12">Teste 2</td>
                            <td class="colorWhite roboto bold font12">2</td>
                            <td class="colorWhite roboto bold font12">2</td>
                            <td class="colorWhite roboto bold font12">2</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal :id="'modalRepositories'" :title="'Salvar repositório'">
        <h2>Teste aqui :|</h2>
    </x-modal>
@endsection