<?php

namespace App\Http\Controllers;

use App\Models\Author;

class PublisherController extends Controller
{
    public function create()
    {
        return view('publishers.create');
    }
}
