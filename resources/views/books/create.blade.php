@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dodaj Książkę
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="{{ route('books.store') }}">
            @csrf
            <div class="form-group">
                <label class="required" for="title">Tytuł</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
            </div>
            <div class="form-group">
                <label class="required" for="isbn">Numer ISBN</label>
                <input class="form-control" type="text" name="isbn" id="isbn" value="{{ old('isbn', '') }}" required>
            </div>
            <div class="form-group">
                <label class="required" for="author_id">Autor</label>
                <select class="form-control select2" name="author_id" id="author_id" required>
                    @foreach($authors as $id => $entry)
                        <option value="{{ $id }}" {{ old('author_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">Kategoria</label>
                <select class="form-control select2" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="required" for="publisher_id">Wydawnictwo</label>
                <select class="form-control select2" name="publisher_id" id="publisher_id" required>
                    @foreach($publishers as $id => $entry)
                        <option value="{{ $id }}" {{ old('publisher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="required" for="publication_year">Rok publikacji</label>
                <input class="form-control" type="number" name="publication_year" min="0" id="publication_year" value="{{ old('publication_year', '') }}" step="1" required>
            </div>
            <div class="form-group">
                <label class="required" for="price">Cena</label>
                <input class="form-control" type="number" name="price" id="price" min="0" value="{{ old('price', '') }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="in_stock">W magazynie</label>
                <input class="form-control" type="number" name="in_stock" id="in_stock" min="0" value="{{ old('in_stock', '') }}" step="1">
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
