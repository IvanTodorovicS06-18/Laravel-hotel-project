@extends('layouts.mlayout')

@section('title')
    Sobe
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Lista Soba
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
                            @foreach($soba as $sobe)
                                <tr>
                                    <td>
                                        {{$sobe->id}}
                                    </td>
                                    <td>
                                        {{$sobe->broj_sobe}}
                                    </td>
                                    <td>
                                        {{$sobe->broj_kreveta}}
                                    </td>
                                    <td>
                                        {{$sobe->cena_sobe}}
                                    </td>
                                    <td >
                                        {{$sobe->zauzeta}}
                                    </td>

                                    <td >
                                        {{$sobe->created_at}}
                                    </td>

                                    <td c>
                                        <a href="/sobe-edit/{{$sobe->id}}" class="btn btn-primary">EDIT </a>
                                    </td>

                                    <td >
                                        <form action="/sobe-delete/{{$sobe->id}}" method="post">
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


