@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edytuj Autora #{{ $author->id }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("authors.update", [$author->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">Imię</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $author->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="surname">Nazwisko</label>
                    <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', $author->surname) }}" required>
                    @if($errors->has('surname'))
                        <div class="invalid-feedback">
                            {{ $errors->first('surname') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        Zapisz
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
