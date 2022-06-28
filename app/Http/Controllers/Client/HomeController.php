<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index(): View
    {
        return view('home.index');
    }
}
