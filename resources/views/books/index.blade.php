@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('books.create') }}">
                Dodaj Książkę
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Lista Książek
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Book">
                    <thead>
                    <tr>
                        <th class="col-sm-1">
                            #
                        </th>
                        <th class="col-1">
                            Tytuł
                        </th>
                        <th class="col-1">
                            ISBN
                        </th>
                        <th class="col-1">
                            Autor
                        </th>
                        <th class="col-1">
                            Kategoria
                        </th>
                        <th class="col-1">
                            Wydawnictwo
                        </th>
                        <th class="col-1">
                            Rok publikacji
                        </th>
                        <th class="col-1">
                            Cena
                        </th>
                        <th class="col-1">
                            W magazynie
                        </th>
                        <th class="col-1">
                            Akcje
                        </th>
                    </tr>

                    <form method="GET">
                        <tr>
                            <th>
                                <input class="form-control form-control-sm" type="number" placeholder="ID" name="id" style="width: 100px" value="{{ request()->get('id') }}">
                            </th>
                            <th>
                                <input class="form-control form-control-sm" type="text" placeholder="Tytuł książki" name="title" value="{{ request()->get('title') }}">
                            </th>
                            <th>
                                <input class="form-control form-control-sm" type="text" placeholder="ISBN" name="isbn" value="{{ request()->get('isbn') }}">
                            </th>
                            <th>
                                <select class="form-control form-control-sm" name="author_id">
                                    <option value="">Autor</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" @selected(request()->get('author_id'))>{{ $author->name }} {{ $author->surname }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <select class="form-control form-control-sm" name="category_id">
                                    <option value="">Kategoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected(request()->get('category_id'))>{{ $category->name }}</option>
                                    @endforeach
                                </select>                            </th>
                            <th>
                                <select class="form-control form-control-sm" name="publisher_id">
                                    <option value="">Wydawnictwo</option>
                                    @foreach($publishers as $publisher)
                                        <option value="{{ $publisher->id }}" @selected(request()->get('publisher_id'))>{{ $publisher->name }}</option>
                                    @endforeach
                                </select>                            </th>
                            <th>
                                <input class="form-control form-control-sm" type="number" placeholder="Rok publikacji" name="publication_year" value="{{ request()->get('publication_year') }}">
                            </th>
                            <th>
                                <input class="form-control form-control-sm" type="number" step="0.01" placeholder="Cena" name="price" value="{{ request()->get('price') }}">
                            </th>
                            <th>
                                <input class="form-control form-control-sm" type="number" placeholder="W magazynie" name="in_stock" value="{{ request()->get('in_stock') }}">
                            </th>
                            <th>
                                <input type="submit" class="btn btn-xs btn-success" value="Filtruj">
                                <a href="{{ route('authors.index') }}" type="reset" class="btn btn-xs btn-warning">Wyczyść filtry</a>
                            </th>
                        </tr>
                    </form>
                    </thead>
                    <tbody>
                    @foreach($books as $key => $book)
                        <tr data-entry-id="{{ $book->id }}">
                            <td>
                                {{ $book->id ?? '' }}
                            </td>
                            <td>
                                {{ $book->title ?? '' }}
                            </td>
                            <td>
                                {{ $book->isbn ?? '' }}
                            </td>
                            <td>
                                {{ $book->author->name ?? '' }} {{ $book->author->surname ?? '' }}
                            </td>
                            <td>
                                {{ $book->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $book->publisher->name ?? '' }}
                            </td>
                            <td>
                                {{ $book->publication_year ?? '' }}
                            </td>
                            <td>
                                {{ $book->price ?? '' }} PLN
                            </td>
                            <td>
                                {{ $book->in_stock ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('books.show', $book->id) }}">
                                    Podgląd
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('books.edit', $book->id) }}">
                                    Edytuj
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć tę książkę?');" style="display: inline-block;">
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
