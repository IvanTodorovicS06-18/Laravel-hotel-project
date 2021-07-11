@extends('layouts.alayout')

@section('title')
    Edit registered roles
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit registered user</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body" style="font-family: sans-serif">
                <form action="/user-update/{{$users->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$users->name}}" name="name" >
                        @error('name')
                        <p> {{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">LastName</label>
                        <input type="text" class="form-control" id="lastname" value="{{$users->lastname}}" name="lastname" >
                        @error('lastname')
                        <p> {{$message}}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" value="{{$users->phone}}" name="phone" >
                        @error('phone')
                        <p> {{$message}}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{$users->email}}" name="email" >
                        @error('email')
                        <p> {{$message}}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="balance">balance</label>
                        <input type="number" class="form-control" id="balance" value="{{$users->balance}}" name="balance" >
                        @error('balance')
                        <p> {{$message}}</p>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="usertype">Usertype</label>
                        <input type="text" class="form-control" id="usertype" value="{{$users->usertype}}" name="usertype" >
                        @error('usertype')
                        <p> {{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 100%">Update </button>

                    <a href="/role-register" class="btn btn-danger" style="width: 100%">Cancel </a>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
