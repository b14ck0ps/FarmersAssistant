<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'product_id',
        'orders_id',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
