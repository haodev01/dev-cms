@extends('layouts.admin')

@section('content')
<div>
  <a href="{{route('categories.index')}}" class="btn btn-success mb-5">Trở lại</a>
  <div class="card">
    <div class="card-header">
      <h3>Sửa danh mục</h3>
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
    </div>
    <div class="card-body">
      <form action="{{route('categories.update', $cate->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
          <input value="{{old('name', $cate->name)}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="Nhập tên từ khóa" />
          @error('name')
          <div class=" text-danger mt-1">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label" for="country">Danh mục cha</label>
          <select value="{{old('parent_id')}}" class="select2 form-select" name="parent_id">
            <option value="">Chọn danh mục cha</option>
            @foreach ($categories as $category )
            <option value="{{$category->id}}" {{ old('parent_id', $cate->parent?->id) && old('parent_id', $cate->parent?->id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Tạo</button>
      </form>
    </div>
  </div>
</div>
@endsection