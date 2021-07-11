@extends('layouts.ulayout')

@section('title')
    Kupite proizvod
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="text-align: center">Minibar</h3>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body" style="font-family: sans-serif">
                    <form action="/user--mini-update" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="minibar">Izaberite Usluge </label>
                            <select multiple name="minibar[]" id="minibar" class="form-control">
                                @foreach($minibar as $minibars)
                                    <option value="{{$minibars->id}} ">
                                        Tip usluge {{$minibars->pice}} cena {{$minibars->cena_pica}}
                                    </option>
                                @endforeach


                            </select>


                            <button type="submit" class="btn btn-dark" style="width: 100%">Kupi </button>
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




