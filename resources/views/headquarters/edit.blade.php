@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edytuj Siedzibę #{{ $headquarters->id }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("headquarters.update", [$headquarters->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="city">Miasto</label>
                    <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('name', $headquarters->city) }}" required>
                    @if($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="publisher_id">Wydawnictwo</label>
                    <select class="form-control select2" name="publisher_id" id="publisher_id">
                        @foreach($publishers as $id => $entry)
                            <option value="{{ $id }}" {{ (old('publisher_id') ? old('publisher_id') : $headquarters->publisher->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('publisher'))
                        <div class="invalid-feedback">
                            {{ $errors->first('publisher') }}
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
