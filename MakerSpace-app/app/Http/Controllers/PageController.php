<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function catalog()
    {
        return view('catalog'); // refers to resources/views/about.blade.php
    }

    // You can add more page methods here later
}