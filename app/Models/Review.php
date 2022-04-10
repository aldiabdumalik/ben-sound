<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'user_id',
        'name',
        'nilai',
        'subject',
        'message',
        'is_show',
    ];
}
