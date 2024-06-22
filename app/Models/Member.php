<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'photo',
        'student_id',
        'department',
        'password',
        'is_password_changed',
        'facebook_link',
        'linkedin_link',
        'instagram_link',
        'portfolio_link',
        'bio',
    ];
}
