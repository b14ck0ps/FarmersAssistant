<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'admin_id',
        'title',
        'drescription',
        'quantity',
        'price'

    ];

}
