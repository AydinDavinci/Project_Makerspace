<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        // $item = Item::all();
        // return view('catalog', compact('item'));
    }

    public function show($id)
    {
        // $item = Item::find($id);
        // return view('product_view', compact('item'));
    }
}