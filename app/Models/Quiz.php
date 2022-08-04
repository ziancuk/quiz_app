<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Option;
use App\Models\Question;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizes';

    protected $fillable = [
        'user_id', 'category_id', 'question_id', 'option_id', 'score'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function option()
    {
        return $this->belongsTo(Option::class, 'question_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
