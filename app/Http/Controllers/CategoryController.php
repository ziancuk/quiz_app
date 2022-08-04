<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('dashboard.category', compact('category'));
    }
    public function addCategory(Request $request)
    {
        $requestCategory = $request->validate(
            [
                'category_name' => 'required|unique:categories'
            ],
            [
                'required' => 'Nama Kategori tidak boleh kosong'
            ]
        );
        Category::create($requestCategory);

        return redirect('/category')->with('status', 'Kategori Berhasil Ditambahkan');
    }
    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();
        return view('dashboard.editCategory', compact('category'));
    }

    public function destroyCategory($id)
    {
        Category::where('id', $id)->delete();
        return redirect('/category',)->with('status', 'Kategori Berhasil Dihapus');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $requestCategory = $request->validate(
            [
                'category_name' => 'required|unique:categories,category_name,' . $category->id
            ],
            [
                'required' => 'Nama Kategori tidak boleh kosong'
            ]
        );
        Category::where('id', $category->id)->update($requestCategory);

        return redirect('/category')->with('status', 'Kategori Berhasil Diubah');
    }
}
