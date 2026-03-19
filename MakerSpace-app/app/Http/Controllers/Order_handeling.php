<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class Order_handeling extends Controller
{
    public function order(Request $request){
        $prefered_fillament = $request->input('type_of_fillament');
        $item_name = $request->input('product_name');

        $order = new Order();
        $order-> user_name = $request->input('user_name');
        $order-> user_email = $request->input('user_email');
        $order-> product_name = $item_name;
        $order-> product_file = $request->input('product_file');
        $order-> product_description = $request->input('product_description');
        $order-> type_of_fillament = $prefered_fillament;
        $order-> color = $request->input('color');
        $order-> status = 'pending';
        $order->save();

        return view('Order_page', ['prefered_fillament' => $prefered_fillament, 'item_name' => $item_name]);
    }

    public function custom_order(Request $request){
        $prefered_fillament = $request->input('type_of_fillament');
        $item_name = $request->input('product_name');
        
        $order = new Order();
        $order-> user_name = $request->input('user_name');
        $order-> user_email = $request->input('user_email');
        $order-> product_name = $item_name;
        $order-> product_file = $request->input('product_file');
        $order-> product_description = $request->input('product_description');
        $order-> type_of_fillament = $prefered_fillament;
        $order-> color = $request->input('color');
        $order-> status = 'pending';
        
        
        return view('custom_order_page', ['prefered_fillament' => $prefered_fillament, 'item_name' => $item_name]);
    }
}

