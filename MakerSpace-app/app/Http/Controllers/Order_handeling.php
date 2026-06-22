<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\User;
use App\Notifications\NewOrderNotification;

class Order_handeling extends Controller
{   

    // this function is for when the user orders a already existing file
    public function order(Request $request){
        
        
        // validate all the user input to prevent any errors or malicious input
        $request ->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string|max:2000',
            'product_file' => 'required|file|mimes:stl,step,stp,3mf,gcode,zip|max:50000',
            'type_of_fillament' => 'required|string',
            'color' => 'nullable|string|max:50',
            'prefered_printer' => 'nullable|string|max:100',
            'support_type' => 'nullable|string|max:100',
            'infill_density' => 'nullable|integer|min:1|max:30',
            'extra_settings' => 'nullable|string|max:2000',

        ]);


        // create new order and fill in the details 
        $order = new Order();
        $order->user_id = auth()->id();
        $order-> user_name = auth()->user()->name ?? 'TEMP';
        $order-> user_email = auth()->user()->email ?? 'TEMP';
        $order-> product_name = $item_name = $request->input('product_name')??'TEMP';
        $order-> product_description = $request->input('product_description')??'TEMP';
        $order-> type_of_fillament = $request->input('type_of_fillament')??'TEMP';
        $order-> color = $request->input('color');
        $order-> prefered_printer = $request->input('prefered_printer')?? 'No preference';
        $order-> status = 'pending';

        // checks if the upload has a file attached  if so he makes a new file and saves it in the uploads folder 
        if($request->hasFile('product_file')) {
            $file = $request->file('product_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $order->product_file = 'uploads/' . $filename;
        } else {
            return redirect()->back()->withErrors(['product_file' => 'Product file is required.']);
        }


        // check if the advanced settings checkbox is checked if so it will save the support type and infill density otherwise it will set them to default values
        if($request->has('advanced_settings_checkbox')){
            $order-> support_type = $request->input('support_type')?? 'No preferred support';
            $order-> infill_density = $request->input('infill_density')?? 15;
        } else {
            $order-> support_type = 'No preferred support';
            $order-> infill_density = 15;
        }
        

        // save the order and add 1 to the users total prints 
        $order->save();
        auth()->user()->increment('total_prints');

        
        // redirect the user back to their dashboard with a success popup
        return redirect()->route("dashboard")->with('order_success', 'Order placed succesfully!');

    }

    // this function is used for custom orders where the user uploads a file and fills in the form with the details of the order

    public function custom_order(Request $request){
        
        // validate all the user input to prevent any errors or malicious input
        $request ->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string|max:2000',
            'type_of_fillament' => 'required|string',
            'color' => 'nullable|string|max:50',
            'product_file' => 'required|file|mimes:stl,step,stp,3mf,gcode,zip|max:50000',

        ]);

        // create a new order 
        $order = new Order();


        // fill in all the details given by the user via the form as well as the uploaded file 
        $order->user_id = auth()->id();
        $order-> user_name = auth()->user()->name ?? 'TEMP';
        $order-> user_email = auth()->user()->email ?? 'TEMP';
        $order-> product_name = $item_name = $request->input('product_name')??'TEMP';
        $order-> product_description = $request->input('product_description');
        $order-> type_of_fillament = $request->input('type_of_fillament');
        $order-> color = $request->input('color');
        $order-> prefered_printer = $request->input('prefered_printer')?? 'No preference';
        $order-> status = 'pending';

        // checks if the upload has a file attached  if so he makes a new file and saves it in the uploads folder 
        if($request->hasFile('product_file')) {
            $file = $request->file('product_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $order->product_file = 'uploads/' . $filename;
        } else {
            return redirect()->back()->withErrors(['product_file' => 'Product file is required.']);
        }

        // check if the advanced settings checkbox is checked if so it will save the support type and infill density otherwise it will set them to default values
        if($request->has('advanced_settings_checkbox')){
            $order-> support_type = $request->input('support_type')?? 'No preferred support';
            $order-> infill_density = $request->input('infill_density')?? 15;
        } else {
            $order-> support_type = 'No preferred support';
            $order-> infill_density = 15;
        }

       
        // save the order and add 1 to the users total prints
        $order->save();
        auth()->user()->increment('total_prints');

        // redirect the user back to their dashboard with a success popup
        session()->forget('uploaded_model');
        return redirect()->route("dashboard")->with('order_success', 'Order placed succesfully!');

    }


public function show() {
    
    $user = auth()->user();


    if ($user->role === 'admin') {
        return view('admin_dashboard', [
            'orders' => order::all(),
            'user' => $user,
            'users' => User::all()
        ]);
    }

    return view('dashboard', [
        'order' => $user->orders,
        'user' => $user
    ]);
}

public function download($orderId)
{
    $order = order::findOrFail($orderId);

    if ($order->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    $filePath = public_path($order->product_file);

    if (!file_exists($filePath)) {
        abort(404, 'File not found.');
    }

    return response()->download(
        $filePath,
        basename($filePath),
        ['Content-Type' => mime_content_type($filePath)]
    );
}};