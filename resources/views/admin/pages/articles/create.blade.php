@extends('layouts.admin')
<script src="{{asset('assets//admin/plugins/ckeditor/ckeditor.js')}}"></script>
@section('content')
<div>
  <a href="{{route('articles.index')}}" class="btn btn-success mb-5">Trở lại</a>
  <div class="card">
    <div class="card-header">
      <h3>Tạo bài viết</h3>
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
    </div>

    <div class="card-body">
      <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-12">
            <div>
              <img id="imagePreview" src="" alt="Hình ảnh sẽ hiển thị tại đây" style="display:none; width: 100%; object-fit:cover; max-width: 100%;max-height:500px;  height: auto; margin:20px 0;">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Chọn thumb</label>
              <input class="form-control" type="file" id="imageUpload" name="thumb" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Tên bài viết</label>
              <input value="{{old('title')}}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Nhập tên bài viết" />
              @error('title')
              <div class=" text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Mô tả</label>
              <textarea value="{{old('desc')}}" name="desc" type="text" class="form-control 
          @error('desc') is-invalid @enderror" placeholder="Nhập tên từ khóa" rows="3"></textarea>
              @error('desc')
              <div class=" text-danger mt-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Chọn danh mục</label>
              <select class="category form-select" name="categories[]" multiple="multiple">
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Chọn từ khóa</label>
              <select class="tags form-select" name="tags[]" multiple="multiple">
                @foreach ($tags as $tag )
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <div>
                <input name="status" class="form-check-input" type="radio" value="1" id="defaultRadio1" checked />
                <label class="form-check-label" for="defaultRadio1"> Công khai </label>
              </div>
              <div>
                <input name="status" class="form-check-input" type="radio" value="0" id="defaultRadio1" />
                <label class="form-check-label" for="defaultRadio1"> Khóa </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Tạo</button>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="exampleInputUsername1">Nội dung</label>
              <textarea id="article_content" name="content" rows="10" class="form-control" placeholder="Nhập nội dung">{!! old('content') !!}</textarea>
              @error('description')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@include('ckfinder::setup')
<script>
  $(document).ready(function() {
    CKEDITOR.replace('article_content', {
      filebrowserBrowseUrl: '{{ route('ckfinder_browser')}}'
    });
    $('.tags').select2({
      placeholder: 'Chọn từ khóa',
      theme: 'classic',
      tags: true
    });
    $('.category').select2({
      placeholder: 'Chọn danh mục',
      theme: 'classic',
    });
    $('#imageUpload').on('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
          $('#imagePreview').show();
          $('#imagePreview').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
  });
</script>
@endsection