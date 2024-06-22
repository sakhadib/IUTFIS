<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'model',
        'details',
    ];

    protected $table = 'editlogs';
    protected $primaryKey = 'id';
}
