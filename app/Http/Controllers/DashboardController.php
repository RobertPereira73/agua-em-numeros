<?php

namespace App\Http\Controllers;

use App\Http\Class\Menu;
use App\Http\Controllers\Controller;
use App\Http\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private Request $request,
        private Menu $menuId = new Menu('Dashboard', 'dashboard'),
        private DashboardService $dashboardService = new DashboardService()
    )
    {}

    public function index()
    {
        return view('dashboard.index', ['actualMenu' => $this->menuId]);
    }

    public function counts()
    {
        $count = $this->dashboardService->count($this->request->type);

        return response(['message' => $count]);
    }
}
