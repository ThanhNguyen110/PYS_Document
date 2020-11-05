@extends('admin.index')
@section('content')
<div id="content" class="container-fluid">
  <div class="card">
    <div class="card-header font-weight-bold">
      Thêm danh mục chính
    </div>
    <div class="card-body">
      <form action="{{url('admin/category/storeMain')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
          <label for="category">Tên danh mục</label>
          <input type="text" name="category" id="category" class="form-control">
        </div>

        <button type="submit" name="btn-add" value="Thêm mới" class="btn btn-primary">Thêm mới</button>
      </form>
    </div>
  </div>
</div>
@endsection