<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Element;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'characterCount' => Character::count(),
            'elementCount' => Element::count(),
        ]);
    }
}

