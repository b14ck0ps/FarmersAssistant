<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'created_at',
        'tittle',
        'body',
        'mails_id',
        'advisor_id'
    ];
}
