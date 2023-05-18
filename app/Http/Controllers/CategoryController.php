<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreUpdateCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categories.show', compact('category'));
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(StoreUpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.show', compact('category'));
    }
}
