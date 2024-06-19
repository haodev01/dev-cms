@extends('layouts.admin')

@section('content')
<div>
  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class=" card-header d-flex justify-content-between align-items-center">
      <h1 class="">Danh sách bài viết</h1>
      <div>
        <a href="{{ route('articles.create') }}" class="btn btn-primary ">Thêm</a>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($articles as $article )
          <tr>
            <td>
              <span class="fw-medium">{{ $article->id }}</span>
            </td>
            <td class="text-wrap ">
              {{ $article->title }}
            </td>
            <td class="text-wrap ">
              {{$article->desc}}
            </td>
            <th>
              <span class="badge fw-bold  py-2 {{ $article->status ===1 ? 'badge bg-success py-2' : 'badge bg-danger py-2'}}">
                {{$article->status ===1 ?'Công khai' : 'Khóa'}}
              </span>
            </th>
            <td>
              {{$article->created_at->diffForHumans()}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('articles.edit', $article->id)}}"><i class="bx bx-edit-alt me-1"></i> Sửa</a>
                  <form action="{{route('articles.destroy', $article->id)}}" method="POST">
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