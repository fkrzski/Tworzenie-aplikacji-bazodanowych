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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
