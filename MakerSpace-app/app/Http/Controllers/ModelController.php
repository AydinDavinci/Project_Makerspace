<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    function custom_upload(){
        \Log::info('Custom upload function called');
        return view('custom_upload');
    }

    public function upload_model(Request $request){
        if ($request->hasFile('model')) {
            $file = $request->file('model');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename);

            session(['uploaded_model' => $filename]);
        }

        return redirect()->route('custom_upload_info');
    }

    function custom_upload_info(){
        \Log::info('Custom upload info function called');
        return view('custom_upload_info');
    }
}