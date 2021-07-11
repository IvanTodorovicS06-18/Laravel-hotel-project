@extends('layouts.mlayout')

@section('title')
    Edit rezervacije
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Rezervacije</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/rez-update/{{ $rezervacije->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="datumrodjenja">Datum Rezervacije </label>
                                <input type="date" class="form-control" id="datumrodjenja" value="{{$rezervacije->datum_rezervacije}}" name="datum_rezervacije" >
                                @error('datum_rezervacije')
                                <p> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="broj_nocenja">Broj nocenja</label>
                                <input type="number" class="form-control" id="broj_nocenja" value="{{ $rezervacije->broj_nocenja}}" name="broj_nocenja" >
                                @error('broj_nocenja')
                                <p> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sobe">Izaberite broj sobe</label>
                                <select  name="soba_id" id="sobe" class="form-control">
                                    @foreach($soba as $sobe)
                                        <option value="{{$sobe->id}}">
                                            Broj sobe {{$sobe->broj_sobe}} broj kreveta {{$sobe->broj_kreveta}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


{{--                            <div class="form-group">--}}
{{--                                <label for="user">Izaberite gosta</label>--}}
{{--                                <select name="user_id" id="user" class="form-control">--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{$user->id}}">--}}
{{--                                           Ime:{{$user->name}} Prezime:{{$user->lastname}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}


                            <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

                            <a href="/rezervacije" class="btn btn-danger" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection


