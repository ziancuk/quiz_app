<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Option;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'question'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function option()
    {
        return $this->HasMany(Option::class);
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
}
