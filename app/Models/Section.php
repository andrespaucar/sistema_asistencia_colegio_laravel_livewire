<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = "sections";
    protected $fillable = [
        'name'
    ];

    public function degree(){
        return $this->belongsTo(Degrees::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'degree_section_user');
    }

}
