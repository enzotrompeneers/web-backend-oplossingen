<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function home() {
        $name = 'Enzo Trompeneers';
        return view('pages.home', compact('name'));
    }
}
