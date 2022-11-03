<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'admin_id',
        'planName',
        'drescription',
        'price',
        'orderDiscount'
    ];

}
