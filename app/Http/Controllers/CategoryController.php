<?php

namespace App\Http\Controllers;

use App\Models\Author;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }
}
