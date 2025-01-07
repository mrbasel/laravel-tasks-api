<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $casts = [
        'is_completed' => 'boolean'
    ];

    protected $fillable = [
        'title',
        'is_completed',
        'user_id'
    ];
}
