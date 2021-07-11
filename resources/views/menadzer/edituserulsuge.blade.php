@extends('layouts.mlayout')

@section('title')
    Edit korsnicke usluge
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Korisnicke usluge</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/userusluga-update/{{ $userusluge->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="uslugehotela">Izaberite Usluge </label>
                                <select  name="uslugehotela_id" id="uslugehotela" class="form-control">
                                    @foreach($uslugehotela as $uslugahotela)
                                        <option value="{{$uslugahotela->id}}">
                                            Tip usluge {{$uslugahotela->tipusluge}}
                                        </option>

                                    @endforeach


                                </select>

{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="user">Izaberite gosta</label>--}}
{{--                                <select name="user_id" id="user" class="form-control">--}}
{{--                                    @foreach($users as $user)--}}
{{--                                        <option value="{{$user->id}}">--}}
{{--                                            Ime:{{$user->name}} Prezime:{{$user->lastname}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}


                            <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

                            <a href="/istorija-kupovine-usluga" class="btn btn-danger" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection



