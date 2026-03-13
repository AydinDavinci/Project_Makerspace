<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Order_handeling extends Controller
{
    public function order(Request $request){
        $prefered_fillament = $request->input('type_of_fillament');
        $item_name = $request->input('product_name');
        return view('Order_page', ['prefered_fillament' => $prefered_fillament, 'item_name' => $item_name]);
    }
}