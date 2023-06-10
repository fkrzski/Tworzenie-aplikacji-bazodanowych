@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edytuj Wydawnictwo #{{ $publisher->id }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("publishers.update", [$publisher->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">Imię</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $publisher->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="headquarter_id">Siedziba</label>
                    <select class="form-control select2" name="headquarter_id" id="headquarter_id">
                        @foreach($headquarters as $id => $entry)
                            <option value="{{ $id }}" {{ (old('headquarter_id') ? old('headquarter_id') : $publisher->headquarter_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('headquarter_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('headquarter_id') }}
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
