@extends('layouts.admin')

@section('content')
<div>
  @if (session('success'))
  <div class="alert alert-success" role="alert">{{ session('success') }}</div>
  @endif
  <div class="card">
    <div class=" card-header d-flex justify-content-between align-items-center">
      <h1 class="">Danh sách vai trò</h1>
      <div>
        <a href="{{ route('roles.create') }}" class="btn btn-primary ">Thêm</a>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Thời gian tạo</th>
            <th>Quyền</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($roles as $role )
          <tr>
            <td>
              <span class="fw-medium">{{ $role->id }}</span>
            </td>
            <td>{{ $role->name }}</td>
            <td>
              {{$role->created_at->diffForHumans()}}
            </td>
            <td style="max-width: 300px">
              <div class="d-flex flex-wrap gap-2">
                @foreach ( $role->permissions as $permission )
                <span class="badge bg-primary">{{$permission->name}}</span>
                @endforeach
              </div>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('roles.edit', $role->id)}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                  <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Xóa</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="p-4">
        {{$roles->withQueryString()->links('pagination::bootstrap-5')}}
      </div>
    </div>
  </div>

</div>

@endsection