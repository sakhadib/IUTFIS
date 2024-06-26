<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $table = 'workshops';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'in_IUT',
        'is_online',
        'link',
        'featured_image',
    ];
}
