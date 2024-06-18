@extends('layouts.admin')

@section('content')
<div>
  <a href="{{route('tags.index')}}" class="btn btn-success mb-5">Trở lại</a>
  <div class="card">
    <div class="card-header">
      <h3>Tạo người dùng</h3>
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
    </div>

    <div class="card-body">
      <form id="formAuthentication" class="mb-3" action="{{route('admin.doReigster')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input value="{{old('username')}}" type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter your username" autofocus />
          @error('username')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input value="{{old('email')}}" type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" />
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3 form-password-toggle">
          <label class="form-label" for="password">Password</label>
          <div class="input-group input-group-merge">
            <input value="{{old('password')}}" type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label" for="country">Vai trò</label>
          <select class="select2 form-select" name="roles[]" required>
            <option value="">Chọn vai trò</option>
            @foreach ($roles as $role )
            <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
      </form>

    </div>
  </div>
</div>
@endsection