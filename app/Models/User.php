<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'birthdate',
        'phone',
        'address',
        'about_me',
        'username',
        'password',
        'role',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class)->withTimestamps();
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getBirthdateFormatAttribute($value)
    {
        if ($this->birthdate != null) {
            return Carbon::parse($this->birthdate)->format('d/m/Y');
        }
    }

    public function scopeTeachers($query)
    {
        return $query->where('role', '=', config('roles.teacher'));
    }
}
