@extends('layouts.admin')

@section('content')
<div>
  @if (session('success'))
  <div class="alert alert-success" role="alert">{{ session('success') }}</div>
  @endif
  <div class="card">
    <div class=" card-header d-flex justify-content-between align-items-center">
      <h1 class="">Danh sách người dùng</h1>
      <div>
        <a href="{{ route('users.create') }}" class="btn btn-primary ">Thêm</a>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user )
          <tr>
            <td>
              <span class="fw-medium">{{ $user->id }}</span>
            </td>
            <td>{{ $user->name }}</td>
            <td>
              <span class="fw-medium">{{$user->email}}</span>
            </td>
            <td>
              @foreach ($user->roles as $role )
              <span>{{$role->name}}</span>
              @endforeach
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Sưa</a>
                  <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">
                      <i class="bx bx-trash me-1"></i> Xóa
                    </button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="p-4">
        {{$users->withQueryString()->links('pagination::bootstrap-5')}}
      </div>
    </div>
  </div>

</div>

<script>

</script>
@endsection