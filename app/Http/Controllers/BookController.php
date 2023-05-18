<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;

class BookController extends Controller
{
    public function create()
    {
        $authors = Author::selectRaw('id, CONCAT(name, " ", surname) AS full_name')->pluck('full_name', 'id')->prepend('Wybierz autora', '');

        $categories = Category::pluck('name', 'id')->prepend('Wybierz kategorię', '');

        $publishers = Publisher::pluck('name', 'id')->prepend('Wybierz wydawnictwo', '');

        return view('books.create', compact('authors', 'categories', 'publishers'));
    }
}
