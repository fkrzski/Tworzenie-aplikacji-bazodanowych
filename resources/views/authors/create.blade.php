@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dodaj Autora
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('authors.store') }}">
        @csrf
        <div class="form-group">
            <label class="required" for="name">Imię</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label class="required" for="surname">Nazwisko</label>
            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', '') }}" required>
            @if($errors->has('surname'))
                <div class="invalid-feedback">
                    {{ $errors->first('surname') }}
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
