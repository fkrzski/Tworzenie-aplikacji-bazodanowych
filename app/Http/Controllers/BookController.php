<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::get();

        $categories = Category::get();

        $publishers = Publisher::get();

        $books = Book::query()->with(['author', 'category', 'publisher']);

        if ($id = $request->get('id')) {
            $books->where('id', '=', $id);
        }

        if ($title = $request->get('title')) {
            $books->where('title', 'LIKE', "%$title%");
        }

        if ($isbn = $request->get('isbn')) {
            $books->where('isbn', 'LIKE', "%$isbn%");
        }

        if ($authorId = $request->get('author_id')) {
            $books->where('author_id', '=', $authorId);
        }

        if ($categoryId = $request->get('category_id')) {
            $books->where('category_id', '=', $categoryId);
        }

        if ($publisherId = $request->get('publisher_id')) {
            $books->where('publisher_id', '=', $publisherId);
        }

        if ($publicationYear = $request->get('publication_year')) {
            $books->where('publication_year', '=', $publicationYear);
        }

        if ($price = $request->get('price')) {
            $books->where('price', '=', $price);
        }

        if ($inStock = $request->get('in_stock')) {
            $books->where('in_stock', '=', $inStock);
        }

        $books = $books->get();

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

    public function edit(Book $book)
    {
        $authors = Author::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $book->load('author', 'category', 'publisher');

        return view('books.edit', compact('authors', 'book', 'categories', 'publishers'));
    }

    public function update(StoreUpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());

        return view('books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();

        $books = Book::with(['author', 'category', 'publisher'])->get();

        $authors = Author::get();

        $categories = Category::get();

        $publishers = Publisher::get();

        return view('books.index', compact('authors', 'books', 'categories', 'publishers'));
    }
}
