@extends('admin.index')
@section('content')
<div id="content" class="container-fluid">
  <div class="card">

    @if (session('status'))
    <div class="alert bg-success text-white">
      {{session('status')}}
    </div>
    @endif

    <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
      <h5 class="m-0">Bài viết mới</h5>
      <div class="form-search form-inline">
        <form action="" method="GET" autocomplete="off">
          <input type="search" name="keyword" class="form-control form-search" placeholder="Tìm kiếm">
          <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-striped table-checkall">
        <thead>
          <tr>
            <th>STT</th>
            <th>Danh mục</th>
            <th style="width: 132px">Tác vụ</th>
          </tr>
        </thead>
        <tbody>
          <a href="{{url('admin/category/addMain')}}" name="btn-add" class="btn btn-primary">Thêm danh mục chính</a>
          &nbsp;
          <a href="{{url('admin/category/addSub')}}" name="btn-add" class="btn btn-secondary">Thêm danh mục phụ</a>
    </div>
  </div>
</div>
@if ($categories->total()>0)
@foreach ($categories as $key => $c)
<tr>
  <th scope="row">
    {{$categories->firstItem() + $key}}
  </th>
  <td>
    {{$c->name}}
  </td>
  <td>
    <a href="{{route('category.editMain', $c->id)}}" class="btn btn-success btn-sm">
      Sửa
    </a>
    <a href="{{route('category.delete', $c->id)}}" class="btn btn-danger btn-sm"
      onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
      Xóa
    </a>
  </td>
</tr>
@endforeach
@else
<tr>
  <td colspan="7" class="bg-white">
    Không tìm thấy bản ghi
  </td>
</tr>
@endif

</tbody>
</table>
</form>
<div class="text-center">
  <div class="d-inline-block">
    {{$categories->links()}}
  </div>
</div>
@endsection