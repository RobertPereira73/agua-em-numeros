<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        private Request $request
    )
    {}

    public function index() : View
    {
        return view('login.index');
    }

    public function login()
    {
        return redirect()->route('login');
    }
}
