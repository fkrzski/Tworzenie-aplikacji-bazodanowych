@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dodaj wydawnictwo
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data">
        <div class="form-group">
            <label class="required" for="name">Nazwa</label>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
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
