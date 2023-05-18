<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePublisherRequest;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(StoreUpdatePublisherRequest $request)
    {
        $publisher = Publisher::create($request->all());

        return redirect()->route('publishers.show', compact('publisher'));
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(StoreUpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->all());

        return redirect()->route('publishers.show', compact('publisher'));
    }
}
