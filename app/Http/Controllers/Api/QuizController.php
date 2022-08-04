<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function kuis()
    {
        $data = Category::with('question')->get();
        return response()->json($data);
    }

    public function quiz($id)
    {
        $question = Question::with('option')->where('category_id', $id)->get();
        return response()->json($question);
    }
}
