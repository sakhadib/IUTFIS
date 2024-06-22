<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = ['competition', 'competition_date', 'rank', 'reff_link', 'story'];

    protected $table = 'achievements';

    protected $primaryKey = 'id';
}
