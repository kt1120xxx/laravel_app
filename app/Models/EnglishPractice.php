<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnglishPractice extends Model
{
    protected $fillable = [
        'engish',
        'japanese',
        'priority',
        'deleted_at',
    ];
}
