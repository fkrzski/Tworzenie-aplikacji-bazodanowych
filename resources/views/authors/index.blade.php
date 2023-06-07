@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('authors.create') }}">
                Dodaj Autora
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Lista Autorów
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Author">
                    <thead>
                    <tr>
                        <th class="col-1">
                            #
                        </th>
                        <th>
                            Imię
                        </th>
                        <th>
                            Nazwisko
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
                                <input class="form-control" type="text" placeholder="Imię autora" name="name" value="{{ request()->get('name') }}">
                            </th>
                            <th>
                                <input class="form-control" type="text" placeholder="Nazwisko autora" name="surname" value="{{ request()->get('surname') }}">
                            </th>
                            <th>
                                <input type="submit" class="btn btn-success" value="Filtruj">
                                <a href="{{ route('authors.index') }}" type="reset" class="btn btn-warning">Wyczyść filtry</a>
                            </th>
                        </tr>
                    </form>
                    </thead>
                    <tbody>
                    @foreach($authors as $key => $author)
                        <tr data-entry-id="{{ $author->id }}">
                            <td>
                                {{ $author->id ?? '' }}
                            </td>
                            <td>
                                {{ $author->name ?? '' }}
                            </td>
                            <td>
                                {{ $author->surname ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('authors.show', $author->id) }}">
                                    Podgląd
                                </a>

                                <a class="btn btn-xs btn-primary" href="{{ route('authors.edit', $author->id) }}">
                                    Edycja
                                </a>

                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tego autora?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="Usuń">
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
