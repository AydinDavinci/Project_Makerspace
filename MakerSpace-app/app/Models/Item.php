<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $fillable = [
        'item_name',
        'item_details',
        'item_date',
        'item_image',
        'item_file',
        'estemated_print_time ',
        'item_creator',
    ];
}