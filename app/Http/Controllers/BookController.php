<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category', 'publisher'])->get();

        $authors = Author::get();

        $categories = Category::get();

        $publishers = Publisher::get();

        return view('books.index', compact('authors', 'books', 'categories', 'publishers'));
    }

    public function create()
    {
        $authors = Author::selectRaw('id, CONCAT(name, " ", surname) AS full_name')->pluck('full_name', 'id')->prepend('Wybierz autora', '');

        $categories = Category::pluck('name', 'id')->prepend('Wybierz kategorię', '');

        $publishers = Publisher::pluck('name', 'id')->prepend('Wybierz wydawnictwo', '');

        return view('books.create', compact('authors', 'categories', 'publishers'));
    }

    public function store(StoreUpdateBookRequest $request)
    {
        $book = Book::create($request->all());

        return redirect()->route('books.show', compact('book'));
    }

    public function show(Book $book)
    {
        $book->load('author', 'category', 'publisher');

        return view('books.show', compact('book'));
    }
}
