<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Quiz;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id', 'option', 'score'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
}
