@extends('theme.index')
@section('content')
<div class="row">
  <div class="col-sm d-inline-block">
    <h4 class="text-dark my-5">Tìm kiếm</h4>

    @if ($posts->count() > 0)
    <ul class="list-unstyled">
      @foreach ($posts as $p)
      @php
      $subCategory = $p->category->slug;
      $mainCategory = App\Category::where('id', $p->category->parent_id)
      ->pluck('slug')
      ->first();
      @endphp
      <li class="media my-5">
        <a href="{{url("doc/{$mainCategory}/{$subCategory}/{$p->slug}")}}">
          <img src="{{asset("image/post/{$p->thumbnail}")}}" width="200px" class="mr-3">
        </a>
        <div class="media-body">
          <h5 class="mt-0 mb-1">
            <a href="{{url("doc/{$mainCategory}/{$subCategory}/{$p->slug}")}}">
              {{$p->title}}
            </a>
          </h5>
          {{$p->description}}
          <br>
          <div class="text-right">
            <a href="{{url("doc/{$mainCategory}/{$subCategory}/{$p->slug}")}}" class="text-secondary text-decoration-none">
              Xem thêm>>
            </a>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
    @else
    Không tìm thấy bài viết
    @endif
  </div>
</div>

<div class="row">
  <div class="col-sm text-center">
    <div class="d-inline-block">
      {{$posts->withQueryString()->links()}}
    </div>
  </div>
</div>
@endsection