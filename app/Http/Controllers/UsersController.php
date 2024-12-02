<?php

namespace App\Http\Controllers;

use App\Http\Class\Menu;
use App\Models\Actor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(
        private Request $request,
        private Menu $menuId = new Menu('Usuários', 'usuarios')
    )
    {}

    public function index() : View
    {
        return view('Users.index', [
            'actualMenu' => $this->menuId,
            'actors' => $this->actors()
        ]);
    }

    public function actors()
    {
        return Actor::paginate(12);
    }
}
