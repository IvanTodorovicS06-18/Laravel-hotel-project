@extends('layouts.alayout')

@section('title')
    Registered roles
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registered Users
                       <a class="btn btn-dark" href="/useradd" >Add new user</a>
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
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
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
                                <td class="text-right">
                                   <a href="/role-edit/{{$user->id}}" class="btn btn-primary">EDIT </a>
                                </td>

                                <td class="text-right">
                                    <form action="/role-delete/{{$user->id}}" method="post">
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

