@extends('layouts.admin')

@section('content')
<div>
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="card">
    <div class=" card-header d-flex justify-content-between align-items-center">
      <h1 class="">Danh sách danh mục</h1>
      <div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary ">Thêm</a>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Người tạo</th>
            <th>Danh mục cha</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($categories as $category )
          <tr>
            <td>
              <span class="fw-medium">{{ $category->id }}</span>
            </td>
            <td>{{ $category->name }}</td>
            <td>
              <span class="fw-medium">{{$category->createdBy->name}}</span>
            </td>
            <td>
              <span class="fw-medium">{{$category->parent?->name}}</span>
            </td>
            <td>
              {{$category->created_at->diffForHumans()}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('categories.edit', $category->id)}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                  <form action="{{route('categories.destroy', $category->id)}}" method="POST">
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
        {{$categories->withQueryString()->links('pagination::bootstrap-5')}}
      </div>
    </div>
  </div>

</div>

<script>

</script>
@endsection