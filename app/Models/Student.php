<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable = [
        'fullname',
        'section_id'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function assistance_student(){
        return $this->belongsToMany(User::class,'assistance_student');
    }
}
