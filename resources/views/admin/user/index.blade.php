@extends('layouts.admin')
@section('title', '/ Người dùng')
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
        <div class="container">

            <!-- The Modal -->
            <div class="modal" id="myModal1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Người dùng </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="card-body">
            <div style="margin-bottom: 15px">
                <button data-toggle="modal" data-target="#myModal1" class="btn btn-success "><i class="fas fa-plus"></i> Thêm</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Vai trò</th>
                        <th>Ngày tạo</th>
                        <th>Hoạt động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Vai trò</th>
                        <th>Ngày tạo</th>
                        <th>Hoạt động</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
