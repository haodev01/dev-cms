@extends('layouts.admin')

@section('content')
<div>
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="card">
    <div class=" card-header d-flex justify-content-between align-items-center">
      <h1 class="">Danh sách từ khóa</h1>
      <div>
        <a href="{{ route('tags.create') }}" class="btn btn-primary ">Thêm</a>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Người tạo</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($tags as $tag )
          <tr>
            <td>
              <span class="fw-medium">{{ $tag->id }}</span>
            </td>
            <td>{{ $tag->name }}</td>
            <td>
              <span class="fw-medium">{{$tag->createBy->name}}</span>
            </td>
            <td>
              {{$tag->created_at->diffForHumans()}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('tags.edit', $tag->id)}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                  <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
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
    </div>
  </div>

</div>

<script>

</script>
@endsection