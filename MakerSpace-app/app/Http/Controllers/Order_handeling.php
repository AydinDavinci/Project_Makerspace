<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class Order_handeling extends Controller
{   

    // this function is for when the user orders a already existing file
    public function order(Request $request){
        $prefered_fillament = $request->input('type_of_fillament');
        
      

        $request ->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string|max:2000',
            'type_of_fillament' => 'required|string',
            'color' => 'nullable|string|max:50',
            'prefered_printer' => 'nullable|string|max:100',
            'support_type' => 'nullable|string|max:100',
            'infill_density' => 'nullable|integer|min:1|max:30'

        ]);

        $order = new Order();

        $order-> user_name = $request->input('user_name')?? 'TEMP';
        $order-> user_email = $request->input('user_email')?? 'TEMP';
        $order-> product_name = $item_name = $request->input('product_name')??'TEMP';
        
        $order->product_file = session('uploaded_model', 'TEMP_FILE')?? 'No file found for already existing order';
 
        $order-> product_description = $request->input('product_description')??'TEMP';
        $order-> type_of_fillament = $prefered_fillament ??"TEMP";
        $order-> color = $request->input('color');
        $order-> prefered_printer = $request->input('prefered_printer')?? 'No preference';
        if($request->has('advanced_settings_checkbox')){
            $order-> support_type = $request->input('support_type')?? 'No preferred support';
            $order-> infill_density = $request->input('infill_density')?? 15;
        } else {
            $order-> support_type = 'No preferred support';
            $order-> infill_density = 15;
        }
        $order-> status = 'pending';
        $order->save();

        return view('Order_page', ['prefered_fillament' => $prefered_fillament, 'item_name' => $item_name]);
    }

    // this function is for an non existing file
    public function custom_order(Request $request){
        $prefered_fillament = $request->input('type_of_fillament');
        $item_name = $request->input('product_name');
        
        $request ->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string|max:2000',
            'type_of_fillament' => 'required|string',
            'color' => 'nullable|string|max:50',
        ]);


        $order = new Order();
        $order-> user_name = $request->input('user_name')?? 'TEMP';
        $order-> user_email = $request->input('user_email')?? 'TEMP';
        $order-> product_name = $item_name = $request->input('product_name')??'TEMP';
    

        $order->product_file = session('uploaded_model', 'TEMP_FILE')?? 'No file found for non existing order';



        $order-> product_description = $request->input('product_description');
        $order-> type_of_fillament = $prefered_fillament;
        $order-> color = $request->input('color');
        $order-> status = 'pending';
        $order->save();
        session()->forget('uploaded_model');
        return view('Order_page', ['prefered_fillament' => $prefered_fillament, 'item_name' => $item_name]);
    }
}

