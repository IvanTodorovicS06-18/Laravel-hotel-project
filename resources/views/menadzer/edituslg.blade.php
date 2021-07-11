@extends('layouts.mlayout')

@section('title')
    Edit Usluge
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Usluge</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/uslg-update/{{ $uslugehotela->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="tipusluge">Tip usluge</label>
                                <input type="text" class="form-control" id="tipusluge" value="{{ $uslugehotela->tipusluge}}" name="tipusluge" >
                                @error('tipusluge')
                                <p> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cena_usluge">Cena usluge</label>
                                <input type="number" class="form-control" id="broj_kreveta" value="{{ $uslugehotela->cena_usluge}}" name="cena_usluge" >
                                @error('cena_usluge')
                                <p> {{$message}}</p>
                                @enderror
                            </div>





                            <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

                            <a href="/uslugehotela" class="btn btn-danger" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection


