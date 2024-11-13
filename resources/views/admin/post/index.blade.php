@extends('layouts.admin')
@section('title', '/ Bài Viết')
@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <em class="fas fa-table"></em>
            Bảng dữ liệu người dùng </div>
        {{--        @if(count($errors)>0)--}}
        {{--            <div class="alert alert-danger">--}}
        {{--                @foreach($errors->all() as $err)--}}
        {{--                    {{$err}} <br>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        @endif--}}
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

        <div class="card-body">
            <div style="margin-bottom: 15px">
                <a href="{{ route('post.create') }}" class="btn btn-success "><i class="fas fa-plus"></i> Thêm</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Describer</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->describer}}</td>
                            <td>{{$post->categoryName}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('user.edit', $post->id)}}">Edit</a>
                                <button type="button" class="btn btn-danger" >
                                    <a href="{{route('post.delete', $post->id)}}" style="color: white;text-decoration: none;" onclick="return confirm ('bạn có muốn xóa {{$post->title}}')">Xóa</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <script>
        setInterval(function(){ $(".alert").fadeOut(); }, 3000);
    </script>
@endsection
