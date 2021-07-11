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
                        <h3 style="text-align: center">Naplata racuna</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                       <p style="text-align: center">Ime:{{$user->name}}</p>
                        <p style="text-align: center">Prezime:{{$user->lastname}}</p>
                        <p style="text-align: center">Email:{{$user->email}}</p>
                        <p style="text-align: center">Balans:{{$user->balance}} din</p>
                        <p style="text-align: center">Racun:{{$user->racun}} din</p>

                        <form action="/placanje" method="post">
                            @csrf
                            <input type="hidden" style="display: none" name="balance" value="{{$user->balance}}">
                            <input type="hidden" style="display: none" name="racun" value="{{$user->racun}}">
                            <button class="btn btn-dark" name="submit" style="width: 100%" type="submit">Plati racun </button>
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

