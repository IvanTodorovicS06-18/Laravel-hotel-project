@extends('layouts.mlayout')

@section('title')
    Dodavanje soba
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Dodajte novu sobu</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/sobesave" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="broj_sobe">Broj sobe</label>
                                <input type="number" class="form-control" @error('broj_sobe') is-invalid @enderror id="broj_sobe" value="{{ old('broj_sobe') }}" required autocomplete="broj_sobe" name="broj_sobe" >
                                @error('broj_sobe')
                                <p> {{$message}}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="broj_kreveta">Broj kreveta</label>
                                <input type="number" class="form-control" @error('broj_kreveta') is-invalid @enderror id="broj_kreveta" value="{{ old('broj_kreveta') }}" required autocomplete="broj_kreveta" name="broj_kreveta" >
                                @error('broj_kreveta')
                                <p> {{$message}}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="cena_sobe">Cena sobe</label>
                                <input type="number" class="form-control"  @error('cena_sobe') is-invalid @enderror id="cena_sobe"  value="{{ old('cena_sobe') }}" required autocomplete="cena_sobe" name="cena_sobe" >
                                @error('cena_sobe')
                                <p> {{$message}}</p>
                                @enderror
                            </div>




                            <button type="submit" class="btn btn-success" style="width: 100%">Dodajte novu sobu</button>

                            <a href="/sobe" class="btn btn-danger" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

