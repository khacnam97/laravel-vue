@extends('layouts.admin')
@section('title', '/ Create')
@section('content')

    <style>
        .custom-file-btn {
            padding: 6px 12px;
            background-color: #666;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
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
            <form method="POST" action="{{route("post.addNew")}} " enctype="multipart/form-data" id="uploadForm">
                @csrf
                @method('POST')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                        @include('errors.alert_error', ['name'=> 'title'])
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Describer</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option selected>Select Categories</option>
                            @foreach($ca as $key => $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Describer</label>
                        <textarea  class="form-control" rows="3" id="describer" name="describer">
                            {{old('describer')}}
                        </textarea>
                    </div>
                </div>
                <div class="form-row ">
                    <div class="form-group col-md-6" >
{{--                        <input type="file" name="filename[]" class="form-control" accept="image/x-png,image/jpeg" required="" accept="image|jpeg|x-png">--}}
{{--                        <div class="input-group-btn">--}}
{{--                            <button class="btn btn-primary add" type="button"><i class="glyphicon glyphicon-plus" id="add"></i>Thêm</button>--}}
{{--                        </div>--}}
                        <label for="imageInput" class="custom-file-btn">
                            📷 Chọn ảnh
                        </label>
                        <input type="file" id="imageInput" name="images[]" accept="image/*" multiple hidden>
                        <div id="preview-container" style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px;"></div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <script>
        let selectedFiles = [];

        document.getElementById('imageInput').addEventListener('change', function(event) {
            const files = Array.from(event.target.files);

            files.forEach(file => {
                // Tạo ID duy nhất cho mỗi ảnh
                const fileId = Date.now() + Math.random();

                selectedFiles.push({ id: fileId, file });

                const reader = new FileReader();
                reader.onload = function(e) {
                    const wrapper = document.createElement('div');
                    wrapper.style.position = 'relative';
                    wrapper.style.display = 'inline-block';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '150px';
                    img.style.margin = '5px';
                    img.style.border = '1px solid #ccc';
                    img.style.padding = '4px';
                    img.style.borderRadius = '6px';

                    const removeBtn = document.createElement('button');
                    removeBtn.innerText = '❌';
                    removeBtn.style.position = 'absolute';
                    removeBtn.style.top = '2px';
                    removeBtn.style.right = '2px';
                    removeBtn.style.background = 'rgba(0,0,0,0.6)';
                    removeBtn.style.color = 'white';
                    removeBtn.style.border = 'none';
                    removeBtn.style.borderRadius = '50%';
                    removeBtn.style.cursor = 'pointer';

                    removeBtn.onclick = function() {
                        wrapper.remove();
                        selectedFiles = selectedFiles.filter(f => f.id !== fileId);
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    document.getElementById('preview-container').appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });

            // Reset input để chọn được file giống nhau nhiều lần
            event.target.value = '';
        });
        console.log(selectedFiles)

        // Tạo FormData thủ công khi submit
        document.getElementById('uploadForm').addEventListener('submit', function (e) {
            e.preventDefault(); // chặn gửi form mặc định

            const formData = new FormData();

            const fields = ['title', 'describer', 'category_id'];

            for (let i = 0; i < fields.length; i++) {
                const field = fields[i];
                const value = document.getElementById(field)?.value ?? '';
                formData.append(field, value);
            }

            selectedFiles.forEach((file, i) => {
                formData.append('images[]', file);
            });

            $.ajax({
                url: "{{ route('post.addNew') }}",
                method: 'POST',
                data: formData,
                processData: false, // Không xử lý dữ liệu
                contentType: false, // Không đặt Content-Type (để browser tự động)
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message || 'Tải lên thành công!');
                        // Có thể làm mới giao diện hoặc xóa preview
                    } else {
                        alert(response.message || 'Có lỗi xảy ra!');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                    alert('Lỗi khi tải ảnh!');
                }
            });

        });
    </script>

@endsection
