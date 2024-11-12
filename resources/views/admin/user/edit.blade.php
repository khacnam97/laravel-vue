@extends('layouts.admin')
@section('title', '/ Edit')
@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <em class="fas fa-table"></em>
            Thêm người dùng
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif
        <div class="container">

        </div>

        <div class="card-body">
            <form method="POST" action="{{route("user.update", $user->id)}} " enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">UserName</label>
                        <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $user->name)}}" autocomplete="name" autofocus>

                        @include('errors.alert_error', ['name'=> 'name'])
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}"  id="inputPassword4" placeholder="Password">
                        @include('errors.alert_error', ['name'=> 'password'])
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputAddress">Address</label>
                        <input type="text" value="{{ $user->address }}" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                </div>
                <div class="form-check" style="padding-bottom: 10px">
                    <input class="form-check-input" type="checkbox" {{ old('roleName', $roleName == 1) ? 'checked' : '' }} value="1" name="role_id" id="role_id">
                    <label class="form-check-label" for="flexCheckDefault">
                         Admin
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
