<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = ['user_name', 'user_email', 'product_name', 'product_file', 'product_description', 'type_of_fillament', 'color', 'status'];
}
