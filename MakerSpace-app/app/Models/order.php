<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
    "user_id",
    "user_name",
    "user_email",
    "product_name",
    "product_file",
    "product_description",
    "type_of_fillament",
    "color",
    "status"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
