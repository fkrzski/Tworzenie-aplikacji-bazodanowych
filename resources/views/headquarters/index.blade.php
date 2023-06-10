@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('headquarters.create') }}">
                Dodaj Siedzibę
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Lista Siedzib
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Publisher">
                    <thead>
                    <tr>
                        <th class="col-1">
                            #
                        </th>
                        <th>
                            Miasto
                        </th>
                        <th>
                            Wydawnictwo
                        </th>
                        <th>
                            Akcje
                        </th>
                    </tr>

                    <form method="GET">
                        <tr>
                            <th>
                                <input class="form-control" type="number" placeholder="ID" name="id" style="width: 100px" value="{{ request()->get('id') }}">
                            </th>
                            <th>
                                <input class="form-control" type="text" placeholder="Miasto" name="city" value="{{ request()->get('city') }}">
                            </th>
                            <th>
                                <select class="form-control form-control" name="publisher_id">
                                    <option value="">Wydawnictwo</option>
                                    @foreach($publishers as $publisher)
                                        <option value="{{ $publisher->id }}" @selected($publisher->id ==request()->get('publisher_id'))>{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <input type="submit" class="btn btn-success" value="Filtruj">
                                <a href="{{ route('headquarters.index') }}" type="reset" class="btn btn-warning">Wyczyść filtry</a>
                            </th>
                        </tr>
                    </form>
                    </thead>
                    <tbody>
                    @foreach($headquarters as $key => $headquarter)
                        <tr data-entry-id="{{ $headquarter->id }}">
                            <td>
                                {{ $headquarter->id ?? '' }}
                            </td>
                            <td>
                                {{ $headquarter->city ?? '' }}
                            </td>
                            <td>
                                {{ $headquarter->publisher?->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('headquarters.show', ['headquarters' => $headquarter->id]) }}">
                                    Podgląd
                                </a>

                                <a class="btn btn-xs btn-primary" href="{{ route('headquarters.edit', ['headquarters' => $headquarter->id]) }}">
                                    Edycja
                                </a>

                                <form action="{{ route('headquarters.destroy', $headquarter->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć to wydawnictwo?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Usuń" @disabled($headquarter->publisher)>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
