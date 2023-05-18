@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Podgląd Kategorii #{{ $category->id }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('categories.index') }}">
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
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nazwa
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('categories.index') }}">
                        Wróć do listy
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
