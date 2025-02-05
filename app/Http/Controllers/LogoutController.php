<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout() : \Illuminate\Routing\Redirector | \Illuminate\Http\RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('dashboard');
    }
}
