<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'star',
        'posted_at',
        'lesson_id',
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeMain($query)
    {
        return $query->orderBy('posted_at', config('amount.sort_hight_to_low'))->limit(config('amount.review_num_home'));
    }

    public function getPostedTimeAttribute()
    {
        return Carbon::parse($this['created_at'])->format(config('course.review_date'));
    }
}
