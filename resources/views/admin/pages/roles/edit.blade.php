@extends('layouts.admin')

@section('content')
<div>
  <a href="{{route('roles.index')}}" class="btn btn-success mb-5">Trở lại</a>
  <div class="card">
    <div class="card-header">
      <h3>Tạo vai trò</h3>
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
    </div>

    <div class="card-body">
      <form action="{{route('roles.update', $role->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label" for="basic-default-fullname">Tên vai trò</label>
          <input value="{{old('name', $role->name)}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="basic-default-fullname" placeholder="Nhập tên vai trò" />
          @error('name')
          <div class=" text-danger mt-1">{{ $message }}</div>
          @enderror

        </div>
        <div class=mb-3>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="checkAll" />
            <label class="form-check-label" for="defaultCheck3"> Chọn tất cả </label>
          </div>
          <div class="row mt-4">
            @foreach ($permissions as $permission )
            <div class="form- !pl-0 col-3 mb-4">
              <input class="form-check-input checkItem" type="checkbox" value="{{$permission->name}}" {{in_array($permission->name, old('permission[]', $role->permissions->pluck('name')->toArray())) ? 'checked' : ''}} name="permission[]" />
              <label class="form-check-label" for="defaultCheck3"> {{$permission->name}} </label>
            </div>
            @endforeach
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Tạo</button>
      </form>
    </div>
  </div>
</div>
<script>
  $('#checkAll').change((event) => {
    let isChecked = event.target.checked;
    $('.checkItem').prop('checked', isChecked);
  })
  $('.checkItem').change(function() {
    let allChecked = $('.checkItem:checked').length === $('.checkItem').length;
    $('#checkAll').prop('checked', allChecked);
  });
  let allChecked = $('.checkItem:checked').length === $('.checkItem').length;
  $('#checkAll').prop('checked', allChecked);
</script>
@endsection