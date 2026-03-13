<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    function custom_upload(){
        \Log::info('Custom upload function called');
        return view('custom_upload');
    }
}