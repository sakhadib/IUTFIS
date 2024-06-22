<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['executive_id', 'category_id', 'title', 'content', 'type', 'is_approved'];

    protected $table = 'posts';

    protected $primaryKey = 'id';
}
