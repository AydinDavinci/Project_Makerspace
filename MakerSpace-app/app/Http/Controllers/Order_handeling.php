<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class Order_handeling extends Controller
{   


    public function order(Request $request){
        $prefered_fillament = $request->input('type_of_fillament');
        

        $order = new Order();
        $order-> user_name = $request->input('user_name')?? 'TEMP';
        $order-> user_email = $request->input('user_email')?? 'TEMP';
        $order-> product_name = $item_name = $request->input('product_name')??'TEMP';
        
        if($request->hasFile('model')){
        $file = $request->file('model');
        $filename = time(). '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $filename);

        $order->product_file = $filename;

        } else{
            $order->product_file = 'TEMP_FILE';
        }   
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
        $order-> user_name = $request->input('user_name')?? 'TEMP';
        $order-> user_email = $request->input('user_email')?? 'TEMP';
        $order-> product_name = $item_name = $request->input('product_name')??'TEMP';
    

        $order->product_file = session('uploaded_model', 'TEMP_FILE');



        $order-> product_description = $request->input('product_description');
        $order-> type_of_fillament = $prefered_fillament;
        $order-> color = $request->input('color');
        $order-> status = 'pending';
        $order->save();
        session()->forget('uploaded_model');
        return view('Order_page', ['prefered_fillament' => $prefered_fillament, 'item_name' => $item_name]);
    }
}

