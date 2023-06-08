@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('publishers.create') }}">
                Dodaj Wydawnictwo
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Lista Wydawnictw
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
                            Nazwa
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
                                <input class="form-control" type="text" placeholder="Nazwa wydawnictwa" name="name" value="{{ request()->get('name') }}">
                            </th>
                            <th>
                                <input type="submit" class="btn btn-success" value="Filtruj">
                                <a href="{{ route('publishers.index') }}" type="reset" class="btn btn-warning">Wyczyść filtry</a>
                            </th>
                        </tr>
                    </form>
                    </thead>
                    <tbody>
                    @foreach($publishers as $key => $publisher)
                        <tr data-entry-id="{{ $publisher->id }}">
                            <td>
                                {{ $publisher->id ?? '' }}
                            </td>
                            <td>
                                {{ $publisher->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('publishers.show', $publisher->id) }}">
                                    Podgląd
                                </a>

                                <a class="btn btn-xs btn-primary" href="{{ route('publishers.edit', $publisher->id) }}">
                                    Edycja
                                </a>

                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć to wydawnictwo?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Usuń" @disabled(! $publisher->books->count())>
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
