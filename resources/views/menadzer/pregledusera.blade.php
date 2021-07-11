@extends('layouts.alayout')

@section('title')
   Detalji korsnika
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Detalji korisnika

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
                                Name
                            </th>
                            <th>
                                Lastname
                            </th>
                            <th>
                                Phone
                            </th>

                            <th class="text-right">
                                Email
                            </th>
                            <th class="text-right">
                                Balance
                            </th>
                            <th class="text-right">
                                Racun
                            </th>
                            <th class="text-right">
                                Usertype
                            </th>

                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->lastname}}
                                    </td>
                                    <td>
                                        {{$user->phone}}
                                    </td>

                                    <td class="text-right">
                                        {{$user->email}}
                                    </td>
                                    <td class="text-right">
                                        {{$user->balance}}
                                    </td>
                                    <td class="text-right">
                                        {{$user->racun}}
                                    </td>
                                    <td class="text-right">
                                        -{{$user->usertype}}
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


