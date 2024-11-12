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
            <form method="POST" action="{{route("categories.update", $ca->id)}} " enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Name</label>
                        <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $ca->name)}}" autocomplete="name" autofocus>

                        @include('errors.alert_error', ['name'=> 'name'])
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
