<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
//        $category = Category::create($request->name);
        $category = Category::create($request->only(['name']));

        return redirect('/categories')->with('message','カテゴリを作成しました');
    }

    public function update(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);

        return redirect('/categories')->with('message','カテゴリを更新しました');
    }

    public function delete(Request $request)
    {
        Category::find($request->id)->delete();

        return redirect('/categories')->with('message','カテゴリを削除しました');
    }
}