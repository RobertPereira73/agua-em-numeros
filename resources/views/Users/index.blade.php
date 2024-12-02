@extends('Body.index')

@section('title', 'Usuários')

@section('links')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <x-form route="repositories" class="w-100 bgNone p-0">
                <x-search-button :name="'search'" :placeholder="'Busque pelo usuário'"/>
            </x-form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="w-100">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="colorWhite roboto bold font12">Usuario</th>
                            <th class="colorWhite roboto bold font12">Repositórios</th>
                            <th class="colorWhite roboto bold font12">Commits</th>
                            <th class="colorWhite roboto bold font12">Comments</th>
                            <th class="colorWhite roboto bold font12">Ações</th>
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
@endsection