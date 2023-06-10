@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Podgląd Siedziby #{{ $headquarters->id }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('headquarters.index') }}">
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
                            {{ $headquarters->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Miasto
                        </th>
                        <td>
                            {{ $headquarters->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Wydawnictwo
                        </th>
                        <td>
                            {{ $headquarters->publisher?->name ?? '-' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('headquarters.index') }}">
                        Wróć do listy
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
