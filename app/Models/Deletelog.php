<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deletelog extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'model',
        'details',
    ];

    protected $table = 'deletelogs';
    protected $primaryKey = 'id';
}
