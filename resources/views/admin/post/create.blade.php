@extends('layouts.admin')
@section('title', '/ Create')
@section('content')

    <div class="card mb-3">
        <div class="card-header">
            <em class="fas fa-table"></em>
            Thêm bài viết
        </div>
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

        </div>

        <div class="card-body">
            <form method="POST" action="{{route("post.addNew")}} " enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Title</label>
                        <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                        @include('errors.alert_error', ['name'=> 'title'])
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Describer</label>
                        <select class="form-control" name="category_id">
                            <option selected>Select Categories</option>
                            @foreach($ca as $key => $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Describer</label>
                        <textarea  class="form-control" rows="3" id="describer" name="describer">
                            {{old('describer')}}
                        </textarea>
                    </div>
                </div>
                <div class=" form-row custom-file" style="height: auto;">

                    <h5>Chọn ảnh</h5>
                    <div class="input-group control-group increment col-md-6" >
                        <input type="file" name="filename[]" class="form-control" accept="image/x-png,image/jpeg" required="" accept="image|jpeg|x-png">
                        <div class="input-group-btn">
                            <button class="btn btn-primary add" type="button"><i class="glyphicon glyphicon-plus" id="add"></i>Thêm</button>
                        </div>
                    </div>
                    <div class="col-md-6 clone" style="overflow: hidden;">
                        <div class="col-md-6 control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control" accept="image/x-png,image/jpeg">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove" id="removed"></i> Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <script type="text/javascript">

        $(document).ready(function() {

            $(".add").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

            var ab=$(".clone");
            ab.hide();

            CKEDITOR.replace('describer');

            $("#submit").on('click',function(){
                if($("#errouser").css('display') == 'block' || $("#erroplace").css('display') == 'block'){
                    alert("Erros! Vui lòng kiểm tra lại thông tin");
                    return false;
                }
            })

        });


    </script>
@endsection
