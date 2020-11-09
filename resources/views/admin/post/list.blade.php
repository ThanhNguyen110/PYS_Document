@extends('admin.index')
@section('content')
  <div id="content" class="container-fluid">
    <div class="card">

      @if (session('status'))
        <div class="alert bg-success text-white">
          {{ session('status') }}
        </div>
      @endif

      <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
        <h5 class="m-0">Bài viết mới</h5>
        <div class="form-search form-inline">
          <form method="GET" autocomplete="off">
            <input type="search" name="search" class="form-control form-search" placeholder="Tìm kiếm">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
          </form>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-checkall">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tình trạng</th>
              <th>Danh mục</th>
              <th>Thể loại</th>
              <th>Ảnh đại diện</th>
              <th>Tiêu đề</th>
              <th style="width: 132px">Tác vụ</th>
            </tr>
          </thead>
          <tbody>
            <a href="{{ url('admin/post/add') }}" name="btn-add" value="Thêm mới" class="btn btn-primary">Thêm mới</a>
      </div>
    </div>
  </div>
  @if ($posts->total() > 0)
    @foreach ($posts as $key => $p)
      @php
      $category = App\Category::find($p->category->parent_id);
      @endphp
      <tr>
        <th scope="row">
          {{ $posts->firstItem() + $key }}
        </th>
        <td>
          {{-- {{ $p->status == 'on' ? 'Công khai' : 'Đang xét duyệt' }}
          --}}
          <form action="{{ url("admin/post/update/{$p->id}") }}" method="POST" autocomplete="off">
            @csrf
            <div class="custom-control custom-switch">
              <input type="checkbox" name="status" class="custom-control-input"
                id="status{{ $posts->firstItem() + $key }}" @if ($p->status != null)
              checked
    @endif>
    <label class="custom-control-label" for="status{{ $posts->firstItem() + $key }}"></label>
    </div>
    </form>
    </td>
    <td>
      {{ $category->name }}
    </td>
    <td>
      {{ $p->category->name }}
    </td>
    <td>
      <img style="width: 100px" src="{{ asset("image/post/{$p->thumbnail}") }}">
    </td>
    <td>
      {{ $p->title }}
    </td>
    <td>
      <a href="{{ route('post.edit', $p->id) }}" class="btn btn-success btn-sm">
        Sửa
      </a>
      <a href="{{ route('post.delete', $p->id) }}" class="btn btn-danger btn-sm"
        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
        Xóa
      </a>
    </td>
    </tr>
  @endforeach
@else
  <tr>
    <td colspan="7" class="bg-white">Không tìm thấy bản ghi</td>
  </tr>
  @endif

  </tbody>
  </table>
  </form>
  <div class="text-center">
    <div class="d-inline-block">
      {{ $posts->withQueryString()->links() }}
    </div>
  </div>
@endsection
