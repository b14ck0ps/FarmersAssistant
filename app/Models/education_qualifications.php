<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education_qualifications extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'institution',
        'graduate_at',
        'added_at',
        'advisor_id'
    ];
   

}
