<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    use HasFactory;
    protected $fillable = ['host_year', 'president_message'];

    protected $table = 'panels';
    protected $primaryKey = 'id';
}
