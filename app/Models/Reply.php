<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'review_id',
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getCreatedTimeAttribute()
    {
        return Carbon::parse($this['created_at'])->format(config('course.review_date'));
    }
}
