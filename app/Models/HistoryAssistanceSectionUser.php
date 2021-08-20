<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryAssistanceSectionUser extends Model
{
    use HasFactory;
    protected $table = "history_assistance_section_user";
    protected $fillable = [
        'date',
        'time',
        'user_id',
        'section_id',
        'degree_id'
    ];
}
