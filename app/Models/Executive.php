<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
    use HasFactory;
    protected $fillable = ['panel_id', 'member_id', 'position', 'year', 'is_reporter', 'is_admin'];
    protected $table = 'executives';
    protected $primaryKey = 'id';
}
