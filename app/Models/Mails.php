<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'body',
        'advisor_id',
        'farmer_id',
    ];
}
