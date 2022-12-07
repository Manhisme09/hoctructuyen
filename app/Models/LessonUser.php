<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lesson_user';

    protected $fillable = [
        'lesson_id',
        'user_id',
    ];
}
