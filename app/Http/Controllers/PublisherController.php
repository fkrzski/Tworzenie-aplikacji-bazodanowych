<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePublisherRequest;
use App\Models\Headquarter;
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

        if ($headquarterId = $request->get('headquarter_id')) {
            $publishers->where('headquarter_id', '=', $headquarterId);
        }

        $publishers = $publishers->get();

        $headquarters = Headquarter::get();

        return view('publishers.index', compact('publishers', 'headquarters'));
    }

    public function create()
    {
        $headquarters = Headquarter::pluck('city', 'id')->prepend('Wybierz siedzibę', '');

        return view('publishers.create', compact('headquarters'));
    }

    public function store(StoreUpdatePublisherRequest $request)
    {
        Publisher::where('headquarter_id', '=', $request->get('headquarter_id'))->update([
            'headquarter_id' => null,
        ]);

        $publisher = Publisher::create($request->all());

        return redirect()->route('publishers.show', compact('publisher'));
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        $headquarters = Headquarter::pluck('city', 'id')->prepend('Wybierz siedzibę', '');

        return view('publishers.edit', compact('publisher', 'headquarters'));
    }

    public function update(StoreUpdatePublisherRequest $request, Publisher $publisher)
    {
        Publisher::where('headquarter_id', '=', $request->get('headquarter_id'))->update([
            'headquarter_id' => null,
        ]);

        $publisher->update($request->all());

        return redirect()->route('publishers.show', compact('publisher'));
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        $publishers = Publisher::all();

        return redirect()->to(route('publishers.index'));
    }
}
