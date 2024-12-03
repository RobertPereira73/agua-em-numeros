<?php

namespace App\Http\Controllers;

use App\Http\Class\Menu;
use App\Http\Controllers\Controller;
use App\Http\Services\DashboardService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private Request $request,
        private Menu $menuId = new Menu('Dashboard', 'dashboard'),
        private DashboardService $dashboardService = new DashboardService()
    )
    {}

    public function index() : View
    {
        return view('dashboard.index', ['actualMenu' => $this->menuId]);
    }

    public function counts() : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $count = $this->dashboardService->count($this->request->type);

        return response(['message' => $count]);
    }

    public function lineChart() : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $this->dashboardService->lineChart();
        return response(['message' => $data]);
    }

    public function pieChart() : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $this->dashboardService->pieChart();
        return response(['message' => $data]);
    }

    public function barChart() : \Illuminate\Http\Response | \Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $this->dashboardService->barChart();
        return response(['message' => $data]);
    }
}
