@extends('layouts.mlayout')

@section('title')
    Edit Minibar
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Minibar</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body" style="font-family: sans-serif">
                        <form action="/minibar-update/{{ $minibar->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="pice">Pice</label>
                                <input type="text" class="form-control" id="pice" value="{{ $minibar->pice}}" name="pice" >
                                @error('pice')
                                <p> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cena_pica">Cena pica</label>
                                <input type="number" class="form-control" id="cena_pica" value="{{ $minibar->cena_pica}}" name="cena_pica" >
                                @error('cena_pica')
                                <p> {{$message}}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="kolicina">Kolicina</label>
                                <input type="number" class="form-control" id="kolicina" value="{{$minibar->kolicina}}" name="kolicina" >
                                @error('kolicina')
                                <p> {{$message}}</p>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

                            <a href="/minibar-pregled" class="btn btn-danger" style="width: 100%">Cancel </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection


