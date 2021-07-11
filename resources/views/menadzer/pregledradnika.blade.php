@extends('layouts.mlayout')

@section('title')
    Registered roles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Lista zaposlenih
                       <a class="btn btn-dark" href="/zaposleniadd" >Dodaj novog zaposlenog</a>
                        <a class="btn btn-dark" href="/radnisati" >Dodajte radne sate prvoj smeni</a>
                        <a class="btn btn-dark" href="/radnisati2" >Dodajte radne sate drugoj smeni</a>
                    </h4>
                               @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Ime
                            </th>
                            <th>
                                Prezime
                            </th>
                            <th>
                                Telefon
                            </th>
                            <th >
                                Adresa
                            </th>
                            <th >
                                Datum rodjenja
                            </th>
                            <th >
                                Di ugovora
                            </th>
                            <th >
                                Di sanitarne
                            </th>

                            <th >
                               Radni sati
                            </th>
                            <th >
                                Dolaznost
                            </th>

                            <th >
                                  Smena
                            </th>
                            <th >
                                Pozicija
                            </th>

                            <th >
                                Edit
                            </th>

                            <th >
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($zaposleni as $zaposlen)
                            <tr>
                                <td>
                                    {{$zaposlen->id}}
                                </td>
                                <td>
                                   {{$zaposlen->ime}}
                                </td>
                                <td>
                                    {{$zaposlen->prezime}}
                                </td>
                                <td>
                                    {{$zaposlen->telefon}}
                                </td>
                                <td >
                                    {{$zaposlen->adresa}}
                                </td>
                                <td >
                                    {{$zaposlen->datumrodjenja}}
                                </td>
                                <td >
                                    {{$zaposlen->datumistekaugovora}}
                                </td>
                                <td >
                                    {{$zaposlen->datumistekasanitarneknjizice}}
                                </td>
                                <td >
                                    {{$zaposlen->radnisati}} h
                                </td>
                                <td >
                                    {{$zaposlen->radio}}
                                </td>
                                <td >
                                    {{$zaposlen->smena}}
                                </td>
                                <td >
                                    {{$zaposlen->pozicija}}
                                </td>
                                <td >
                                   <a href="/zaposleni-edit/{{$zaposlen->id}}" class="btn btn-primary">EDIT </a>
                                </td>

                                <td >
                                    <form action="/zaposleni-delete/{{$zaposlen->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-secondary" type="submit">DELETE </button>
                                    </form>
                                </td>

                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('scripts')
            <script>
                $(document).ready(function() {
                    $('#datatable').DataTable();
                } );
            </script>
@endsection

