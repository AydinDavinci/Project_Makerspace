<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $phone = Setting::where('key', 'contact_phone')->first();
        return view('settings', ['phone' => $phone ? $phone->value : '']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
        ]);

        Setting::updateOrCreate(
            ['key' => 'contact_phone'],
            ['value' => $request->phone]
        );

        return redirect()->route('settings')->with('success', 'Telefoonnummer opgeslagen!');
    }
}