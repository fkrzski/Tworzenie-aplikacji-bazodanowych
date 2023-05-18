@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dodaj Kategorię
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label class="required" for="name">Nazwa</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                Dodaj
            </button>
        </div>
        </form>
    </div>
</div>
@endsection
