<?php

namespace App\Http\Controllers;

use App\Http\Class\Menu;
use App\Http\Services\RepositoriesService;
use App\Models\Actor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RepositoriesController extends Controller
{
    public function __construct(
        private Request $request,
        private Menu $actualMenu = new Menu('Repositórios', 'repositorios'),
        private RepositoriesService $repositoriesService = new RepositoriesService()
    )
    {}

    public function index() : View
    {
        $repositories = $this->repositories();
        $actors = Actor::select('id', 'login')
            ->lazy();

        return view('Repositories.index', [
            'actualMenu' => $this->actualMenu,
            'actors' => $actors,
            'repositories' => $repositories
        ]);
    }

    public function repositories() : string
    {
        $repositories = $this->repositoriesService->repositories($this->request->all());
        return view('Repositories.table', ['repositories' => $repositories])->render();
    }

    public function search ()
    {
        $repositories = $this->repositories();
        
        return response(['message' => $repositories]);
    }

    public function store()
    {
        $this->request->validate(
            [
                'name' => ['required'],
                'actor_id' => ['required', 'exists:actors,id']
            ],
            [
                'name.required' => 'Campo nome é obrigatório!',
                'actor_id.required' => 'Campo de usuário é obrigatório!',
                'actor_id.exists' => 'Usuário selecionado não encontrado!'
            ]
        );

        $data = $this->repositoriesService->store($this->request->all());

        return response(['message' => $data]);
    }

    public function delete()
    {
        $this->repositoriesService->delete($this->request->id);

        return response(['message' => true]);
    }
}
