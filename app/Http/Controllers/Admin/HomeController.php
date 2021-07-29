<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'AREA 6 | ADMIN'
        ]);
    }
    public function data()
    {
        return view('admin.data', [
            'title' => 'AREA 6 | ADMIN'
        ]);
    }
}
