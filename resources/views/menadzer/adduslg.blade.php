@extends('layouts.mlayout')

@section('title')
    Dodajte novu uslugu
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Dodajte novu uslugu</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/saveuslg" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="tipusluge">Tip usluge</label>
                                <input type="text" class="form-control" @error('tipusluge') is-invalid @enderror id="tipusluge" value="{{ old('tipusluge') }}" required autocomplete="tipusluge" name="tipusluge" >
                                @error('tipusluge')
                                <p> {{$message}}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="cena_usluge">Cena usluge</label>
                                <input type="number" class="form-control" @error('cena_usluge') is-invalid @enderror id="cena_usluge" value="{{ old('cena_usluge') }}" required autocomplete="cena_usluge" name="cena_usluge" >
                                @error('broj_kreveta')
                                <p> {{$message}}</p>
                                @enderror
                            </div>







                            <button type="submit" class="btn btn-success" style="width: 100%">Dodajte novu uslugu</button>

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


