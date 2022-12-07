<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lesson_name',
        'requirements',
        'description',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function getProgressAttribute()
    {
        $programsLearned = Program::whereHas('users', function ($query) {
            $query->where('users.id', auth()->id())->where('programs.lesson_id', $this->id);
        })->count();

        $totalPrograms = $this->programs->count();

        return $totalPrograms == 0 ? 0 : round(($programsLearned / $totalPrograms) * 100, 2);
    }

    public function scopeSearch($query, $data)
    {

        if (!empty($data['key_search'])) {
            $query->where(
                'lesson_name',
                'LIKE',
                "%{$data['key_search']}%"
            );
        }
        return $query;
    }

    public function isLearned()
    {
        return $this->users()->where('user_id', auth()->id());
    }
}
