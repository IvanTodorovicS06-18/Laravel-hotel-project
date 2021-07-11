@extends('layouts.mlayout')

@section('title')
    Dodajte novog zaposlenog
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add new user</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/zaposlenisave" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="Ime">Ime</label>
                                <input type="text" class="form-control" @error('ime') is-invalid @enderror id="Ime" value="{{ old('ime') }}" required autocomplete="ime" name="ime" >
                                @error('ime')
                                <p> {{$message}}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="prezime">Prezime</label>
                                <input type="text" class="form-control" @error('prezime') is-invalid @enderror id="prezime" value="{{ old('prezime') }}" required autocomplete="prezime" name="prezime" >
                                @error('prezime')
                                <p> {{$message}}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="telefon">Telefon</label>
                                <input type="text" class="form-control"  @error('telefon') is-invalid @enderror id="telefon"  value="{{ old('telefon') }}" required autocomplete="telefon" name="telefon" >
                                @error('telefon')
                                <p> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="adresa">Adresa</label>
                                <input type="text" class="form-control"  @error('adresa') is-invalid @enderror id="adresa" value="{{ old('adresa') }}" required autocomplete="adresa" name="adresa" >
                                @error('address')
                                <p> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="datumrodjenja">Datum rodjenja</label>
                                <input type="date" class="form-control" @error('datumrodjenja') is-invalid @enderror id="datumrodjenja" value="{{ old('datumrodjenja') }}" required autocomplete="datumrodjenja" name="datumrodjenja" >
                                @error('datumrodjenja')
                                <p> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="datumistekasanitarneknjizice">Datum isteka sanitarne knjizice</label>
                                <input type="date" class="form-control" @error('datumistekasanitarneknjizice') is-invalid @enderror id="datumistekasanitarneknjizice" value="{{ old('datumistekasanitarneknjizice') }}" required autocomplete="datumistekasanitarneknjizice" name="datumistekasanitarneknjizice" >
                                @error('datumistekasanitarneknjizice')
                                <p> {{$message}}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for=" datumistekaugovora">Datum isteka ugovora</label>
                                <input type="date" class="form-control" @error('datumistekaugovora') is-invalid @enderror id="datumistekaugovora" value="{{ old('datumistekaugovora') }}" required autocomplete="datumistekaugovora" name="datumistekaugovora" >
                                @error('datumistekaugovora')
                                <p> {{$message}}</p>
                                @enderror
                            </div>






                            <div class="form-group">
                                <label for="pozicija">Pozicija</label>
                                <input type="text" class="form-control"  @error('pozicija') is-invalid @enderror id="pozicija"  value="{{ old('pozicija') }}" autocomplete="pozicija" name="pozicija" >
                                @error('pozicija')
                                <p> {{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success" style="width: 100%">Dodajte zaposlenog </button>

                            <a href="/role-register" class="btn btn-danger" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
