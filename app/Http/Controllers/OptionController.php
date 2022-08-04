<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        $option = Option::with('question')->get();
        $question = Question::get();
        return view('dashboard.option', compact('option', 'question'));
    }

    public function addOption(Request $request)
    {
        $requestOption = $request->validate(
            [
                'question_id' => 'required',
                'option' => 'required',
                'score' => 'required'
            ],
            [
                'option.required' => 'Form option tidak boleh kosong',
                'score.required' => 'Form score tidak boleh kosong'
            ]
        );
        Option::create($requestOption);

        return redirect('/option')->with('status', 'Option Berhasil Ditambahkan');
    }

    public function editOption($id)
    {
        $question = Question::get();
        $option = Option::with('question')->where('id', $id)->first();
        return view('dashboard.editOption', compact('question', 'option'));
    }

    public function updateOption(Request $request, Option $option)
    {
        $requestOption = $request->validate(
            [
                'question_id' => 'required',
                'option' => 'required',
                'score' => 'required'
            ],
            [
                'option.required' => 'Form option tidak boleh kosong',
                'score.required' => 'Form score tidak boleh kosong'
            ]
        );
        Option::where('id', $option->id)->update($requestOption);

        return redirect('/option')->with('status', 'Option Berhasil Diubah');
    }

    public function destroyOption($id)
    {
        Option::where('id', $id)->delete();
        return redirect('/option')->with('status', 'Option Berhasil Dihapus');
    }
}
