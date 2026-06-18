<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('catalog', compact('items'));
    }

    public function show($id)
{
    $items = Item::find($id);
    return view('product_view', compact('items'));

}

    // public function added_item(){
    //  wip
    // }
}   