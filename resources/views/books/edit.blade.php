@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edytuj Książkę #{{ $book->id }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("books.update", [$book->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">Tytuł</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="isbn">Numer ISBN</label>
                    <input class="form-control {{ $errors->has('isbn') ? 'is-invalid' : '' }}" type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                    @if($errors->has('isbn'))
                        <div class="invalid-feedback">
                            {{ $errors->first('isbn') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="author_id">Autor</label>
                    <select class="form-control select2 {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author_id" id="author_id" required>
                        @foreach($authors as $id => $entry)
                            <option value="{{ $id }}" {{ (old('author_id') ? old('author_id') : $book->author->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('author'))
                        <div class="invalid-feedback">
                            {{ $errors->first('author') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="category_id">Kategoria</label>
                    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                        @foreach($categories as $id => $entry)
                            <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $book->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="publisher_id">Wydawnictwo</label>
                    <select class="form-control select2 {{ $errors->has('publisher') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id" required>
                        @foreach($publishers as $id => $entry)
                            <option value="{{ $id }}" {{ (old('publisher_id') ? old('publisher_id') : $book->publisher->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('publisher'))
                        <div class="invalid-feedback">
                            {{ $errors->first('publisher') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="publication_year">Rok publikacji</label>
                    <input class="form-control {{ $errors->has('publication_year') ? 'is-invalid' : '' }}" type="number" name="publication_year" id="publication_year" value="{{ old('publication_year', $book->publication_year) }}" step="1" required>
                    @if($errors->has('publication_year'))
                        <div class="invalid-feedback">
                            {{ $errors->first('publication_year') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="price">Cena</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $book->price) }}" step="0.01" required>
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="in_stock">W magazynie</label>
                    <input class="form-control {{ $errors->has('in_stock') ? 'is-invalid' : '' }}" type="number" name="in_stock" id="in_stock" value="{{ old('in_stock', $book->in_stock) }}" step="1">
                    @if($errors->has('in_stock'))
                        <div class="invalid-feedback">
                            {{ $errors->first('in_stock') }}
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
