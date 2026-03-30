<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class UpdatePrinterTable extends Controller
{
    public function Addprinter(Request $request){
        $request->validate([
            'Printer_name' => 'required|string|max:255',
            'Printer_type' => 'required|string|max:255',
            'Printer_status' => 'required|string|max:255',
            'Printer_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }
}
