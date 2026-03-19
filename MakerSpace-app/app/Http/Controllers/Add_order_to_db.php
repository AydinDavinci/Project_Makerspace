<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;

class Add_order_to_db extends Controller
{
     public function Add_to_database(Request $request){
        $order = new Order();
        $order->user_name = $request->input('user_name');
        $order->user_email = $request->input('user_email');
        $order->product_name = $request->input('product_name');
        
        if ($request->hasFile('product_image')) {
            $file_name = $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/uploads', $file_name);
            $order->product_file = $file_name;
        } else {
            $order->product_file = null; // or handle as needed
        }
        
        $order->product_description = $request->input('product_description');
        $order->type_of_fillament = $request->input('type_of_fillament');
        $order->color = $request->input('color');
        $order->status = 'pending';
        
        try {
            $order->save();
        } catch (\Exception $e) {
            // Log the error or handle it
            \Log::error('Failed to save order: ' . $e->getMessage());
            throw $e; // or return false, depending on how you want to handle
        }
    }
}
