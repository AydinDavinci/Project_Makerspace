<?php

namespace Database\Seeders;

use App\Models\Printer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeederPrinter extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Printer::create([
            'Printer_name' => 'bambu lab ',
            'Model' => 'x1 carbon',
            'status' => 'Active',
        ]);
    

        Printer::create([
            'Printer_name' => 'anycubic ',
            'Model' => 'i3 mega',
            'status' => 'Active',
        ]);
}}