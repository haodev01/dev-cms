@extends('layouts.admin')

@section('content')
<div>
  @if (session('success'))
  <div class="alert alert-success" role="alert">{{ session('success') }}</div>
  @endif
  <form class="row" method="GET">
    <div class="mb-3 col-6">
      <input class="form-control" type="search" value="{{request('keyword')}}" placeholder="Tìm kiếm ..." name="keyword" />
    </div>
  </form>
  <div class="card">
    <div class=" card-header d-flex justify-content-between align-items-center">
      <h1 class="">Danh sách quyền</h1>
      <div>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary ">Thêm</a>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Tên gruad</th>
            <th>Thời gian tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($permissions as $permission )
          <tr>
            <td>
              <span class="fw-medium">{{ $permission->id }}</span>
            </td>
            <td>{{ $permission->name }}</td>
            <td>
              <span class="fw-medium">{{$permission->guard_name}}</span>
            </td>
            <td>
              {{$permission->created_at->diffForHumans()}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('permissions.edit', $permission->id)}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                  <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
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
        {{$permissions->withQueryString()->links('pagination::bootstrap-5')}}
      </div>
    </div>
  </div>

</div>

@endsection