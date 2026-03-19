<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\Add_order_to_db;

class Order_handeling extends Controller
{
    public function order(Request $request){
        $preferred_fillament = $request->input('type_of_fillament');
        $item_name = $request->input('product_name');
        $user_name = $request->input('user_name');
        $user_email = $request->input('user_email');
        
        if($request->hasFile('product_image')){
            $file_name = $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/uploads', $file_name); 
        }
            
        (new Add_order_to_db)->Add_to_database($request);

        return view('Order_page', ['preferred_fillament' => $preferred_fillament, 'item_name' => $item_name]);


    }
    public function custom_order(Request $request){
        $preferred_fillament = $request->input('type_of_fillament');
        $item_name = $request->input('product_name');
        
        if($request->hasFile('product_image')){
            $file_name = $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/uploads', $file_name);
        }
        
        (new Add_order_to_db)->Add_to_database($request);
        
        return view('Order_page', ['preferred_fillament' => $preferred_fillament, 'item_name' => $item_name]);
    }


   


}