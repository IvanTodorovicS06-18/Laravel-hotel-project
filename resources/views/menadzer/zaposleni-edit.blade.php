@extends('layouts.mlayout')

@section('title')
    Edit registered roles
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit registered user</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body" style="font-family: sans-serif">
                <form action="/zaposleni-update/{{ $zaposleni->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="ime">Ime</label>
                        <input type="text" class="form-control" id="ime" value="{{ $zaposleni->ime}}" name="ime" >
                        @error('ime')
                        <p> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prezime">Prezime</label>
                        <input type="text" class="form-control" id="prezime" value="{{ $zaposleni->prezime}}" name="prezime" >
                        @error('prezime')
                        <p> {{$message}}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="telefon">Telefon</label>
                        <input type="text" class="form-control" id="telefon" value="{{$zaposleni->telefon}}" name="telefon" >
                        @error('telefon')
                        <p> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="adresa">adresa</label>
                        <input type="text" class="form-control" id="adresa" value="{{$zaposleni->adresa}}" name="adresa" >
                        @error('adresa')
                        <p> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="datumrodjenja">Datum rodjenja </label>
                        <input type="date" class="form-control" id="datumrodjenja" value="{{$zaposleni->datumrodjenja}}" name="datumrodjenja" >
                        @error('datumrodjenja')
                        <p> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="datumistekaugovora">Datum isteka ugovora </label>
                        <input type="date" class="form-control" id="datumistekaugovora" value="{{$zaposleni->datumistekaugovora}}" name="datumistekaugovora" >
                        @error('datumistekaugovora')
                        <p> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="datumistekasanitarneknjizice">Datum isteka sanitarne knjizice </label>
                        <input type="date" class="form-control" id="datumrodjenja" value="{{$zaposleni->datumistekasanitarneknjizice}}" name="datumistekasanitarneknjizice" >
                        @error('datumistekasanitarneknjizice')
                        <p> {{$message}}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="radnisati">Radni sati</label>
                        <input type="number" class="form-control" id="radnisati" value="{{$zaposleni->radnisati}}" name="radnisati" >
                        @error('radnisati')
                        <p> {{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dosao">Dolaznost</label>
                        <select id="dosao" name="radio"  value="{{$zaposleni->radio}}" class="form-control">
                            <option value="dosao" >Dosao</option>
                            <option value="nijedosao" >Nije dosao</option>
                        </select>

                        @error('radio')
                        <p> {{$message}}</p>
                        @enderror


                    </div>

                    <div class="form-group">
                        <label for="smena">Smena</label>
                        <select id="smena" name="smena"  value="{{$zaposleni->smena}}" class="form-control">
                            <option value="prva" >Prva</option>
                            <option value="druga" >Druga</option>
                        </select>

                        @error('smena')
                        <p> {{$message}}</p>
                        @enderror


                    </div>

                    <div class="form-group">
                        <label for="pozicija">Pozicija</label>
                        <input type="text" class="form-control" id="pozicija" value="{{$zaposleni->pozicija}}" name="pozicija" >
                        @error('pozicija')
                        <p> {{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

                    <a href="/zaposleni" class="btn btn-danger" style="width: 100%">Cancel </a>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
