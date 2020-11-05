@extends('admin.index')
@section('content')
<div id="content" class="container-fluid">
  <div class="card">
    <div class="card-header font-weight-bold">
      Thêm danh mục phụ
    </div>
    <div class="card-body">
      <form action="{{url('admin/category/storeSub')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf        
        <div class="form-group">
          <label for="sub_category">Danh mục phụ</label>
          <input type="text" name="sub_category" id="sub_category" class="form-control">
        </div>

        <div class="form-group">
          <label for="category">Thuộc danh mục</label>
          <select name="category" id="category" class="form-control">
            @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" name="btn-add" value="Thêm mới" class="btn btn-primary">Thêm mới</button>
      </form>
    </div>
  </div>
</div>
@endsection