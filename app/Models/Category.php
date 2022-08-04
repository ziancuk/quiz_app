<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Quiz;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    public function question()
    {
        return $this->hasMany(Question::class);
    }
    public function quiz()
    {
        return $this->hasMany(Question::class);
    }
}
