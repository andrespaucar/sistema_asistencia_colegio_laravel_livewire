<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degrees extends Model
{
    use HasFactory;
    protected $table = "degrees";
    protected $fillable = [
        'name'
    ];

    public function sections(){
        return $this->hasMany(Section::class,'degree_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'degree_section_user');
    }
}
