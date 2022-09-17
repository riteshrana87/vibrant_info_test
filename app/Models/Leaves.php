<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;

    protected $table = 'leave';

    protected $fillable = [
        'user_id',
        'title',
        'leave_date',
        'leave_description',
        'status',
    ];
}
