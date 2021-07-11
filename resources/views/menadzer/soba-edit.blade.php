@extends('layouts.mlayout')

@section('title')
    Edit Sobe
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit sobe br {{$soba->broj_sobe}}</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/sobe-update/{{ $soba->id}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="broj_kreveta">Broj kreveta</label>
                                <input type="number" class="form-control" id="broj_kreveta" value="{{ $soba->broj_kreveta}}" name="broj_kreveta" >
                                @error('broj_kreveta')
                                <p> {{$message}}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="cena_sobe">Cena sobe</label>
                                <input type="number" class="form-control" id="cena_sobe" value="{{$soba->cena_sobe}}" name="cena_sobe" >
                                @error('cena_sobe')
                                <p> {{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="zauzeta">Zauzeta</label>
                                <select id="zauzeta" name="zauzeta"  value="{{$soba->zauzeta}}" class="form-control">
                                    <option value="jeste" >Jeste</option>
                                    <option value="nije" >Nije </option>
                                </select>
                                @error('zauzeta')
                                <p> {{$message}}</p>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

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

