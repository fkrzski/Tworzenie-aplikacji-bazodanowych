@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('categories.create') }}">
                Dodaj Kategorię
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Lista Kategorii
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
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
                                <input class="form-control" type="text" placeholder="Nazwa kategorii" name="name" value="{{ request()->get('name') }}">
                            </th>
                            <th>
                                <input type="submit" class="btn btn-success" value="Filtruj">
                                <a href="{{ route('categories.index') }}" type="reset" class="btn btn-warning">Wyczyść filtry</a>
                            </th>
                        </tr>
                    </form>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>
                                {{ $category->id ?? '' }}
                            </td>
                            <td>
                                {{ $category->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('categories.show', $category->id) }}">
                                    Podgląd
                                </a>

                                <a class="btn btn-xs btn-primary" href="{{ route('categories.edit', $category->id) }}">
                                    Edycja
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę kategorię?');" style="display: inline-block;">
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
