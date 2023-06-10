@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Filip Krzyżanowski – Tworzenie Aplikacji Bazodanowych (TAB)
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Zadania: slajd 15, slajd 24, slajd 43, slajd 32 i Na ocenę 5,0 (lub dla podwyższenia liczby punktów)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
