@extends('admin.index')
@section('content')
<div id="content" class="container-fluid">
  <div class="card">
    <div class="card-header font-weight-bold">
      Sửa bài viết
    </div>
    <div class="card-body">
      <form action="{{url("admin/post/update/{$posts->id}")}}" method="POST" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        <div class="custom-control custom-switch mb-3">
          <input type="checkbox" name="status" class="custom-control-input" id="status" @if ($posts->status != null)
          checked @endif>
          <label class="custom-control-label" for="status">Công khai</label>
        </div>
        <div class="form-group">
          <label for="category">Danh mục chính</label>
          <select name="category" id="category" class="form-control">
            @foreach ($categories as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="sub_category">Danh mục con</label>
          <select name="sub_category" id="sub_category" class="form-control">
            @foreach ($sub_categories as $s)
            <option value="{{$s->id}}" @if ($s->id == $posts->category_id) selected @endif>
              {{$s->name}}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="title">Tiêu đề</label>
          <input class="form-control" type="text" name="title" id="title" value="{{$posts->title}}" required>
        </div>
        <div class="form-group">
          <label for="description">Mô tả ngắn</label>
          <input class="form-control" type="text" name="description" id="description" value="{{$posts->description}}"
            required>
        </div>
        <div class="form-group">
          <label for="content">Nội dung</label>
          <textarea name="content" id="content">{{$posts->content}}</textarea>
        </div>

        <button type="submit" name="btn-add" value="Thêm mới" class="btn btn-primary">Cập nhật</button>
      </form>
    </div>
  </div>
</div>
@endsection