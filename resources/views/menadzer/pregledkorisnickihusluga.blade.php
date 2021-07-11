@extends('layouts.mlayout')

@section('title')
  Istorija kupovine
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Istorija kupovine usluga
                        <a class="btn btn-dark" href="/adduserusluge" >Dodaj novu Uslugu korisniku</a>

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
                                User id
                            </th>
                            <th>
                               usluga id
                            </th>
                            <th>
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
                            @foreach($userusluge as $userusluga)
                            <tr>
                                <td>
                                    {{$userusluga->id}}
                                </td>
                                <td>
                                    <a href="/pregledusera/{{$userusluga->user_id}}">
                                    {{$userusluga->user_id}}
                                    </a>
                                </td>
                                <td>
                                    <a href="/pregledusluge/{{$userusluga->uslugehotela_id}}">
                                    {{$userusluga->uslugehotela_id}}
                                    </a>
                                </td>
                                <td >
                                    {{$userusluga->created_at}}
                                </td>

                                <td c>
                                    <a href="/userusluga-edit/{{$userusluga->id}}" class="btn btn-primary">EDIT </a>
                                </td>

                                <td >
                                    <form action="/Transakcija-usluge-delete/{{$userusluga->id}}" method="post">
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




