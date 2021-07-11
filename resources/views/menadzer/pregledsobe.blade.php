@extends('layouts.mlayout')

@section('title')
    Sobe
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Pregled sobe
                        <a class="btn btn-dark" href="/sobeadd" >Dodaj novu sobu</a>

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
                                Broj sobe
                            </th>
                            <th>
                                Broj kreveta
                            </th>
                            <th>
                                Cena sobe
                            </th>
                            <th >
                                Zauzeta
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

                                <tr>
                                    <td>
                                        {{$soba->id}}
                                    </td>
                                    <td>
                                        {{$soba->broj_sobe}}
                                    </td>
                                    <td>
                                        {{$soba->broj_kreveta}}
                                    </td>
                                    <td>
                                        {{$soba->cena_sobe}}
                                    </td>
                                    <td >
                                        {{$soba->zauzeta}}
                                    </td>
                                    <td >
                                        {{$soba->created_at}}
                                    </td>

                                    <td c>
                                        <a href="/sobe-edit/{{$soba->id}}" class="btn btn-primary">EDIT </a>
                                    </td>

                                    <td >
                                        <form action="/sobe-delete/{{$soba->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary" type="submit">DELETE </button>
                                        </form>
                                    </td>

                                </tr>

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



