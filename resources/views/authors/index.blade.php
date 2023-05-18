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
                        <th>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
