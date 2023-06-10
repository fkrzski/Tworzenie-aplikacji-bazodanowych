<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::get();

        $categories = Category::get();

        $publishers = Publisher::get();

        $books = Book::query()->with(['author', 'categories', 'publisher']);

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
            $books->whereHas('categories', function (Builder $categories) use ($categoryId) {
                $categories->where('category_id', '=', $categoryId);
            });
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

        $categories = Category::pluck('name', 'id');

        $publishers = Publisher::pluck('name', 'id')->prepend('Wybierz wydawnictwo', '');

        return view('books.create', compact('authors', 'categories', 'publishers'));
    }

    public function store(StoreUpdateBookRequest $request)
    {
        $book = Book::create($request->all());
        $book->categories()->sync($request->get('categories'));

        return redirect()->route('books.show', compact('book'));
    }

    public function show(Book $book)
    {
        $book->load('author', 'categories', 'publisher');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::pluck('name', 'id')->prepend(trans('Wybierz Autora'), '');

        $categories = Category::pluck('name', 'id');

        $publishers = Publisher::pluck('name', 'id')->prepend(trans('Wybierz Wydawnictwo'), '');

        $book->load('author', 'categories', 'publisher');

        return view('books.edit', compact('authors', 'book', 'categories', 'publishers'));
    }

    public function update(StoreUpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());
        $book->categories()->sync($request->get('categories'));

        return view('books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->to(route('books.index'));
    }
}
