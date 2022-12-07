<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'program_name',
        'file_type',
        'lesson_id',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function isLearned()
    {
        return $this->users()->where('user_id', auth()->id());
    }

    public function getTypeFileAttribute()
    {
        if ($this['file_type'] == 'docx') {
            return 'word';
        } elseif ($this['file_type'] == 'mp4') {
            return 'video';
        } elseif ($this['file_type'] == 'pdf') {
            return 'pdf';
        }
    }
}
