@extends('layouts.ulayout')

@section('title')
   Rezervacija
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center">Napravite rezervaciju</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/rez-save" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="datum_rezervacije">Datum rezervacije</label>
                                <input type="date" class="form-control" @error('datum_rezervacije') is-invalid @enderror id="datum_rezervacije" value="{{ old('datum_rezervacije') }}" required autocomplete="datum_rezervacije" name="datum_rezervacije" >
                                @error('datum_rezervacije')
                                <p> {{$message}}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="broj_nocenja">Broj nocenja</label>
                                <input type="number" class="form-control" @error('broj_nocenja') is-invalid @enderror id="broj_nocenja" value="{{ old('broj_nocenja') }}" required autocomplete="broj_nocenja" name="broj_nocenja" >
                                @error('broj_nocenja')
                                <p> {{$message}}</p>
                                @enderror

                            </div>





                            <div class="form-group">
                                <label for="sobe">Izaberite broj sobe</label>
                                <select name="soba_id" id="sobe" class="form-control">

                                    @foreach($soba as $sobe)

                                        <option value="{{$sobe->id}}">
                                            Broj sobe {{$sobe->broj_sobe}} broj kreveta {{$sobe->broj_kreveta}} Cena sobe {{$sobe->cena_sobe}}
                                        </option>

                                    @endforeach
                                </select>

                            </div>




                            <button type="submit" class="btn btn-dark" style="width: 100%">Napravite rezervaciju</button>
                                <hr>
                            <a href="/mainpage" class="btn btn-dark" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

