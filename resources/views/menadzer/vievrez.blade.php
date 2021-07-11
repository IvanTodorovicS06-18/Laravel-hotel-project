@extends('layouts.mlayout')

@section('title')
    Rezervacije
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Lista Rezervacija
                        <a class="btn btn-dark" href="/addrezm" >Dodaj novu Rezervaciju</a>

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
                                User_id
                            </th>
                            <th>
                                Soba_id
                            </th>

                            <th >
                                Datum rezervacije
                            </th>
                            <th >
                                Broj nocenja
                            </th>
                            <th >
                                Dodata
                            </th>

                            <th >
                                Edit
                            </th>

                            <th >
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($rezervacije as $rezervacija)
                                <tr>
                                    <td>
                                        {{$rezervacija->id}}
                                    </td>
                                    <td>
                                        <a href="/pregledusera/{{$rezervacija->user_id}}">
                                        {{$rezervacija->user_id}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/pregledsobe/{{$rezervacija->soba_id}}">
                                        {{$rezervacija->soba_id}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$rezervacija->datum_rezervacije}}
                                    </td>
                                    <td >
                                        {{$rezervacija->broj_nocenja}}
                                    </td>
                                    <td >
                                        {{$rezervacija->created_at}}
                                    </td>


                                    <td c>
                                        <a href="/rez-edit/{{$rezervacija->id}}" class="btn btn-primary">EDIT </a>
                                    </td>

                                    <td >
                                        <form action="/rez-delete/{{$rezervacija->id}}" method="post">
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


