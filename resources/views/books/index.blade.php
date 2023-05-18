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
                        <th>
                            #
                        </th>
                        <th>
                            Tytuł
                        </th>
                        <th>
                            numer ISBN
                        </th>
                        <th>
                            Autor
                        </th>
                        <th>
                            Kategoria
                        </th>
                        <th>
                            Wydawnictwo
                        </th>
                        <th>
                            Rok publikacji
                        </th>
                        <th>
                            Cena
                        </th>
                        <th>
                            W magazynie
                        </th>
                        <th>
                            Akcje
                        </th>
                    </tr>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
