<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::with('category')->get();
        $category = Category::get();
        return view('dashboard.question', compact('question', 'category'));
    }

    public function addQuestion(Request $request)
    {
        $requestQuestion = $request->validate(
            [
                'category_id' => 'required',
                'question' => 'required'
            ],
            [
                'required' => 'Form question tidak boleh kosong'
            ]
        );
        Question::create($requestQuestion);

        return redirect('/question')->with('status', 'Question Berhasil Ditambahkan');
    }

    public function editQuestion($id)
    {
        $category = Category::get();
        $question = Question::with('category')->where('id', $id)->first();
        return view('dashboard.editQuestion', compact('question', 'category'));
    }

    public function updateQuestion(Request $request, Question $question)
    {
        $requestQuestion = $request->validate(
            [
                'category_id' => 'required',
                'question' => 'required'
            ],
            [
                'required' => 'Form tidak boleh ada yang kosong'
            ]
        );
        Question::where('id', $question->id)->update($requestQuestion);

        return redirect('/question')->with('status', 'Question Berhasil Diubah');
    }

    public function destroyQuestion($id)
    {
        Question::where('id', $id)->delete();
        return redirect('/question',)->with('status', 'Question Berhasil Dihapus');
    }
}
