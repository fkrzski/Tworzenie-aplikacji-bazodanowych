<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(StoreUpdateAuthorRequest $request)
    {
        $author = Author::create($request->all());

        return view('authors.show', compact('author'));
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(StoreUpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->all());

        return view('authors.show', compact('author'));
    }
}
