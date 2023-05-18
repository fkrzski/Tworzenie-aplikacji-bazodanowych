<?php

namespace App\Http\Controllers;

class AuthorController extends Controller
{
    public function create()
    {
        return view('authors.create');
    }
}
