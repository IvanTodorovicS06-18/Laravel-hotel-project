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
                        <a class="btn btn-dark" href="/minibar-pregled" >Nazad</a>


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
                                minibar id
                            </th>
                            <th>
                                Dodata
                            </th>



                            <th >
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($userminibar as $userminibars)
                                <tr>
                                    <td>
                                        {{$userminibars->id}}
                                    </td>
                                    <td>
                                        <a href="/pregledusera/{{$userminibars->user_id}}">
                                            {{$userminibars->user_id}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/pregledproizvoda/{{$userminibars->minibar_id}}">
                                            {{$userminibars->minibar_id}}
                                        </a>
                                    </td>
                                    <td >
                                        {{$userminibars->created_at}}
                                    </td>

                                    <td >
                                        <form action="/user-minibar-delete/{{$userminibars->id}}" method="post">
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





