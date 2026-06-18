<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('item')->insert([
            [
                'id' => 1,
                'item_name' => 'Resin Print Skull',
                'item_details' => 'High-detail resin model for testing supports.',
                'item_date' => '2024-11-12',
                'item_image' => 'skull_preview.png',
                'item_file' => 'skull_model.stl',
            ],
            [
                'id' => 2,
                'item_name' => 'Benchy',
                'item_details' => 'Standard calibration print for tuning settings.',
                'item_date' => '2024-10-03',
                'item_image' => 'benchy.jpg',
                'item_file' => 'benchy.stl',
            ],
            [
                'id' => 3,
                'item_name' => 'Gear Prototype',
                'item_details' => 'Functional gear for mechanical stress testing.',
                'item_date' => '2024-09-21',
                'item_image' => 'gear.png',
                'item_file' => 'gear_v2.stl',
            ],
            [
                'id' => 4,
                'item_name' => 'Phone Stand',
                'item_details' => 'Minimalist stand for desk setups.',
                'item_date' => '2024-12-01',
                'item_image' => 'phone_stand.jpg',
                'item_file' => 'phone_stand.stl',
            ],
            [
                'id' => 5,
                'item_name' => 'Dragon Statue',
                'item_details' => 'Decorative model with complex overhangs.',
                'item_date' => '2024-11-05',
                'item_image' => 'dragon.png',
                'item_file' => 'dragon_final.stl',
            ],
            [
                'id' => 6,
                'item_name' => 'Calibration Cube',
                'item_details' => '20mm cube for dimensional accuracy.',
                'item_date' => '2024-10-15',
                'item_image' => 'cube.jpg',
                'item_file' => 'cube_20mm.stl',
            ],
            [
                'id' => 7,
                'item_name' => 'Vase Spiral Mode',
                'item_details' => 'Thin-wall vase for flow rate testing.',
                'item_date' => '2024-12-18',
                'item_image' => 'vase.png',
                'item_file' => 'vase_spiral.stl',
            ],
            [
                'id' => 8,
                'item_name' => 'Keychain Logo',
                'item_details' => 'Small branded keychain prototype.',
                'item_date' => '2024-09-30',
                'item_image' => 'keychain.jpg',
                'item_file' => 'keychain_logo.stl',
            ],
            [
                'id' => 9,
                'item_name' => 'RC Car Wheel',
                'item_details' => 'TPU wheel for RC car prototypes.',
                'item_date' => '2024-11-27',
                'item_image' => 'rc_wheel.png',
                'item_file' => 'rc_wheel_tpu.stl',
            ],
            [
                'id' => 10,
                'item_name' => 'Cable Clip',
                'item_details' => 'Utility clip for cable management.',
                'item_date' => '2024-12-22',
                'item_image' => 'cable_clip.jpg',
                'item_file' => 'cable_clip.stl',
            ],
        ]);
    }
}
