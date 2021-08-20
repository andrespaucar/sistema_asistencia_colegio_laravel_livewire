<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'telephone',
        'type',
        'course_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assistance_student(){
        return $this->belongsToMany(Student::class,'assistance_student');
    }

    public function section_user(){
        return $this->belongsToMany(Section::class,'degree_section_user');
    }
    public function degrees_user(){
        return $this->belongsToMany(Degrees::class,'degree_section_user','','degree_id');
    }

    public function courses(){
        return $this->belongsTo(Course::class);
    }

     
}
