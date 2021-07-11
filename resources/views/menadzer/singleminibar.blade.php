@extends('layouts.mlayout')

@section('title')
    Minibar
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Mini bar

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
                                Pice
                            </th>
                            <th>
                                Cena
                            </th>
                            <th>
                                Kolicina
                            </th>
                            <th>
                                Dodato
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
                                        {{$minibar->id}}
                                    </td>
                                    <td>

                                        {{$minibar->pice}}

                                    </td>
                                    <td>

                                        {{$minibar->cena_pica}}

                                    </td>
                                    <td >
                                        {{$minibar->kolicina}}
                                    </td>
                                    <td >
                                        {{$minibar->created_at}}
                                    </td>

                                    <td c>
                                        <a href="/minibar-edit/{{$minibar->id}}" class="btn btn-primary">EDIT </a>
                                    </td>

                                    <td >
                                        <form action="/minibar-delete/{{$minibar->id}}" method="post">
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





