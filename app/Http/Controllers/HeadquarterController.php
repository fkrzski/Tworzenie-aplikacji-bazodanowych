<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateHeadquarterRequest;
use App\Models\Headquarter;
use App\Models\Publisher;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HeadquarterController extends Controller
{
    public function index(Request $request)
    {
        $headquarters = Headquarter::query();

        if ($id = $request->get('id')) {
            $headquarters->where('id', '=', $id);
        }

        if ($city = $request->get('city')) {
            $headquarters->where('city', 'LIKE', "%$city%");
        }

        if ($publisherId = $request->get('publisher_id')) {
            $headquarters->whereHas('publisher', function (Builder $publisher) use ($publisherId) {
                $publisher->where('publishers.id', '=', $publisherId);
            });
        }

        $headquarters = $headquarters->get();

        $publishers = Publisher::get();

        return view('headquarters.index', compact('headquarters', 'publishers'));
    }

    public function create()
    {
        $publishers = Publisher::pluck('name', 'id')->prepend('Wybierz wydawnictwo', '');

        return view('headquarters.create', compact('publishers'));
    }

    public function store(StoreUpdateHeadquarterRequest $request)
    {
        /** @var \App\Models\Headquarter $headquarters */
        $headquarters = Headquarter::create($request->all());

        /** @var Publisher $publisher */
        if ($publisher = Publisher::find((int) $request->get('publisher_id'))) {
            $publisher->headquarter()->associate($headquarters);
            $publisher->save();
        }

        return view('headquarters.show', compact('headquarters'));
    }

    public function show(Headquarter $headquarters)
    {
        return view('headquarters.show', compact('headquarters'));
    }

    public function edit(Headquarter $headquarters)
    {
        $publishers = Publisher::pluck('name', 'id')->prepend('Wybierz wydawnictwo', '');

        return view('headquarters.edit', compact('headquarters', 'publishers'));
    }

    public function update(StoreUpdateHeadquarterRequest $request, Headquarter $headquarters)
    {
        $headquarters->update($request->all());

        /** @var Publisher $publisher */
        if ($publisher = Publisher::find((int) $request->get('publisher_id'))) {
            $publisher->headquarter()->associate($headquarters);
            $publisher->save();
        }

        return view('headquarters.show', compact('headquarters'));
    }

    public function destroy(Headquarter $headquarters)
    {
//        dd($headquarter);
        $headquarters->delete();

        return redirect()->to(route('headquarters.index'));
    }
}
