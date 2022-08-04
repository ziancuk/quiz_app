<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function welcome()
    {
        $category = Category::with('question')->get();
        return view('quiz.welcome', compact('category'));
    }
    public function quiz($id)
    {
        $category = Category::where('id', $id)->first();
        $question = Question::with('option')->where('category_id', $id)->get();

        return view('quiz.quiz', compact('category', 'question'));
    }

    public function storeQuiz(Request $request)
    {
            dd($request->all());
    }
    
}
