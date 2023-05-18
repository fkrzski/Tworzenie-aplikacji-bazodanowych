@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Podgląd Ksiązki #{{ $book->id }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('books.index') }}">
                        Wróć do listy
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            #
                        </th>
                        <td>
                            {{ $book->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tytuł
                        </th>
                        <td>
                            {{ $book->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Numer ISBN
                        </th>
                        <td>
                            {{ $book->isbn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Autor
                        </th>
                        <td>
                            {{ $book->author->name ?? '' }} {{ $book->author->surname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Kategoria
                        </th>
                        <td>
                            {{ $book->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Wydawnictwo
                        </th>
                        <td>
                            {{ $book->publisher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Rok publikacji
                        </th>
                        <td>
                            {{ $book->publication_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Cena
                        </th>
                        <td>
                            {{ $book->price }} PLN
                        </td>
                    </tr>
                    <tr>
                        <th>
                            W magazynie
                        </th>
                        <td>
                            {{ $book->in_stock }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('books.index') }}">
                        Wróć do listy
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
