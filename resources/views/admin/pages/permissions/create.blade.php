@extends('layouts.admin')

@section('content')
<div>
  <a href="{{route('permissions.index')}}" class="btn btn-success mb-5">Trở lại</a>
  <div class="card">
    <div class="card-header">
      <h3>Tạo quyền</h3>
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
    </div>

    <div class="card-body">
      <form action="{{route('permissions.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="basic-default-fullname">Tên</label>
          <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="Nhập tên quyền" />
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