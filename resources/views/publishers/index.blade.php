@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('publishers.create') }}">
                Dodaj Wydawnictwo
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Lista Wydawnictw
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Publisher">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nazwa
                        </th>
                        <th>
                            Akcje
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publishers as $key => $publisher)
                        <tr data-entry-id="{{ $publisher->id }}">
                            <td>
                                {{ $publisher->id ?? '' }}
                            </td>
                            <td>
                                {{ $publisher->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('publishers.show', $publisher->id) }}">
                                    Podgląd
                                </a>

                                <a class="btn btn-xs btn-primary" href="{{ route('publishers.edit', $publisher->id) }}">
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
