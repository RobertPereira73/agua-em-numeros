<?php

namespace App\Http\Controllers;

use App\Http\Class\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RepositoriesController extends Controller
{
    public function __construct(
        private Request $request,
        private Menu $actualMenu = new Menu('Repositórios', 'repositorios')
    )
    {
        
    }

    public function index() : View
    {
        return view('Repositories.index', ['actualMenu' => $this->actualMenu]);
    }
}
