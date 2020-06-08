<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable = [
        'todo',
        'week',
        'type',
        'memo',
        'start',
        'end'
    ];
}
