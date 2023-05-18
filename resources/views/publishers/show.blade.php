@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Podgląd Wydawnictwa #{{ $publisher->id }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('publishers.index') }}">
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
                            {{ $publisher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nazwa
                        </th>
                        <td>
                            {{ $publisher->name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('publishers.index') }}">
                        Wróć do listy
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
