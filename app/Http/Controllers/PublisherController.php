<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $publishers = Publisher::query();

        if ($id = $request->get('id')) {
            $publishers->where('id', '=', $id);
        }

        if ($name = $request->get('name')) {
            $publishers->where('name', 'LIKE', "%$name%");
        }

        $publishers = $publishers->get();

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

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        $publishers = Publisher::all();

        return view('publishers.index', compact('publishers'));
    }
}
