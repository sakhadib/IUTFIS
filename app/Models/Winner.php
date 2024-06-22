<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'achievement_id',
    ];

    protected $table = 'winners';
    protected $primaryKey = 'id';
}
