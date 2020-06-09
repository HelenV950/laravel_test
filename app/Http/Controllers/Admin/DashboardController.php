<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('admin/dashboard');
    }
}
