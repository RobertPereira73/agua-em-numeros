@extends('Body.index')

@section('title', 'Repositórios')

@section('links')
    @parent
    <script src="{{ asset('js/repositories/repositories.js') }}"></script>
@endsection

@section('content')
    <div class="row justify-content-between">
        <div class="col-6">
            <h2 class="colorWhite roboto">
                Repositórios
            </h2>
        </div>

        <div class="col-2">
            <x-button type="button" class="d-flex align-items-center justify-content-center bg-primary" :events="'onclick=' . 'openModal()'"> 
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
            <x-form route="repositories.search" class="w-100 bgNone p-0">
                <x-search-button :name="'search'" :placeholder="'Busque pelo repositório'"/>
            </x-form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div id="repositories" class="w-100">
                {!! $repositories !!}
            </div>
        </div>
    </div>

    <x-modal :route="'repositories.store'" :id="'modalRepositories'" :title="'Salvar repositório'">
        <input type="hidden" name="id">

        <x-container-input :name="'name'">
            <x-input name="name" placeholder="Nome do repositório" type="text"/>
        </x-container-input>

        <x-container-input :name="'repo_url'">
            <x-input name="repo_url" placeholder="Url do repositório" type="text"/>
        </x-container-input>

        <x-container-input :name="'actor_id'">
            <select name="actor_id" class="form-control defaultInput colorWhite roboto">
                <option disabled selected>Selecione um usuário</option>
                @foreach ($actors as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->login }}</option>
                @endforeach
            </select>
        </x-container-input>

        <x-container-input :name="'description'">
            <textarea name="description" class="form-control defaultInput colorWhite roboto"></textarea>
        </x-container-input>
    </x-modal>
@endsection