<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'farmer_id',
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
