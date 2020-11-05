@extends('admin.index')
@section('content')
<div id="content" class="container-fluid">
  <div class="card">
    <div class="card-header font-weight-bold">
      Thêm bài viết
    </div>
    <div class="card-body">
      <form action="{{url('admin/post/store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="custom-control custom-switch mb-3">
          <input type="checkbox" name="status" class="custom-control-input" id="status">
          <label class="custom-control-label" for="status">Công khai</label>
        </div>
        <div class="form-group">
          <label for="category">Danh mục chính</label>
          <select name="category" id="category" class="custom-select">
            @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="sub_category">Danh mục con</label>
          <select name="sub_category" id="sub_category" class="custom-select">
            @foreach ($sub_categories as $s)
            <option value="{{$s->id}}">{{$s->name}}</option>
            @endforeach
          </select>
        </div>
        {{-- <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile" data-browse="Chọn">Hình đại diện</label>
        </div> --}}
        <div class="form-group">
          <label for="thumbnail">Hình đại diện</label>
          <input type="file" name="thumbnail" id="thumbnail" class="form-control">
        </div>
        <div class="form-group">
          <label for="title">Tiêu đề</label>
          <input class="form-control" type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
          <label for="description">Mô tả ngắn</label>
          <input class="form-control" type="text" name="description" id="description" required>
        </div>
        <div class="form-group">
          <label>Nội dung</label>
          <textarea name="content"></textarea>
        </div>

        <button type="submit" name="btn-add" value="Thêm mới" class="btn btn-primary">Thêm mới</button>
      </form>
    </div>
  </div>
</div>
@endsection