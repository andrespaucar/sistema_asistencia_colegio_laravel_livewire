<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceStudent extends Model
{
    use HasFactory;
    protected $table = "assistance_student";
    protected $fillable = [
        'student_id',
        'user_id',
        'date',
        'time',
        'status'
    ];
}
