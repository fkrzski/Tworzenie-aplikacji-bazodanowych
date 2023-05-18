@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Podgląd Autora #{{ $author->id }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('authors.index') }}">
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
                            {{ $author->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Imię
                        </th>
                        <td>
                            {{ $author->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nazwisko
                        </th>
                        <td>
                            {{ $author->surname }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('authors.index') }}">
                        Wróć do listy
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
