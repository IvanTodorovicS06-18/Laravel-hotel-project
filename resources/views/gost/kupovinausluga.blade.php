@extends('layouts.ulayout')

@section('title')
    Kupite uslugu
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="text-align: center"> Usluge</h3>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body" style="font-family: sans-serif">
                    <form action="/user-update" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="uslugehotela">Izaberite Usluge </label>
                            <select multiple name="uslugehotela[]" id="uslugehotela" class="form-control">
                                @foreach($uslugehotela as $uslugahotela)
                                    <option value="{{$uslugahotela->id}}"  @if($user->uslugehotela->contains($uslugahotela->id))
                                    selected
                                        @endif>
                                        Tip usluge {{$uslugahotela->tipusluge}} cena {{$uslugahotela->cena_usluge}}

                                    </option>

                                @endforeach


                            </select>



                            <button type="submit" class="btn btn-dark btn-sm" style="width: 100%">kupi </button>
                                        <hr>
                        <a href="/mainpage" class="btn btn-dark" style="width: 100%">Cancel </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection



