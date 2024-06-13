@extends('layouts.admin')

@section('content')
<div>
  <a href="{{route('tags.index')}}" class="btn btn-success mb-5">Trở lại</a>
  <div class="card">
    <div class="card-header">
      <h3>Tạo từ khóa</h3>
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
    </div>

    <div class="card-body">
      <form action="{{route('tags.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="basic-default-fullname">Tên từ khóa</label>
          <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="Nhập tên từ khóa" />
          @error('name')
          <div class=" text-danger mt-1">{{ $message }}</div>
          @enderror

        </div>

        <button type="submit" class="btn btn-primary">Tạo</button>
      </form>
    </div>
  </div>
</div>
@endsection