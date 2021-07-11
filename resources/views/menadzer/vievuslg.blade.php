@extends('layouts.mlayout')

@section('title')
   Usluge hotela
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Lista Usluga
                        <a class="btn btn-dark" href="/adduslg" >Dodaj novu Uslugu</a>
                        <a class="btn btn-dark" href="/istorija-kupovine-usluga" >Istorija kupovine usluga</a>

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
                               Tip usluge
                            </th>
                            <th>
                                Cena usluge
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
                            @foreach($uslugehotela as $uslugahotela)
                                <tr>
                                    <td>
                                        {{$uslugahotela->id}}
                                    </td>
                                    <td>

                                        {{$uslugahotela->tipusluge}}

                                    </td>
                                    <td>

                                        {{$uslugahotela->cena_usluge}}

                                    </td>
                                    <td>
                                        {{$uslugahotela->created_at}}
                                    </td>



                                    <td c>
                                        <a href="/uslg-edit/{{$uslugahotela->id}}" class="btn btn-primary">EDIT </a>
                                    </td>

                                    <td >
                                        <form action="/uslg-delete/{{$uslugahotela->id}}" method="post">
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



