@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dodaj autora
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data">
        <div class="form-group">
            <label class="required" for="name">Imię</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
        </div>
        <div class="form-group">
            <label class="required" for="surname">Nazwisko</label>
            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', '') }}" required>
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
