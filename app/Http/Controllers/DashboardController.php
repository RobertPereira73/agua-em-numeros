<?php

namespace App\Http\Controllers;

use App\Http\Class\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private Request $request,
        private Menu $menuId = new Menu('Dashboard', 'dashboard')
    )
    {}

    public function index()
    {
        return view('dashboard.index', ['actualMenu' => $this->menuId]);
    }
}
