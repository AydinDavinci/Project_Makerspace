<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    function custom_upload(){
        \Log::info('Custom upload function called');
        return view('custom_upload');
    }

    function custom_upload_info(){
        \Log::info('Custom upload info function called');
        return view('custom_upload_info');
    }

}