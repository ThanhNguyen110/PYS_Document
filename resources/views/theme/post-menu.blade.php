@extends('theme.category')
@section('menu')
<div class="col-sm-7">
  <h4>
    @if (isset($mainSubcategory))
    {{$mainSubcategory->name}}
    @else
    {{$main_category->name}}
    @endif
  </h4>

  @if ($posts->count() > 0)
  <ul class="list-unstyled">
    @foreach ($posts as $p)
    @php
    $subCategory = App\Category::where('id', $p->category_id)->first();
    @endphp
    <li class="media my-4">
      <a href="{{url("doc/{$main_category->slug}/{$subCategory->slug}/{$p->slug}")}}">
        <img src="{{asset("image/post/{$p->thumbnail}")}}" width="200px" class="mr-3">
      </a>
      <div class="media-body">
        <h5 class="mb-1">
          <a href="{{url("doc/{$main_category->slug}/{$subCategory->slug}/{$p->slug}")}}" class="text-decoration-none">
            {{$p->title}}
          </a>
        </h5>
        {{$p->description}}
        <br>
        <div class="text-right">
          <a href="{{url("doc/{$main_category->slug}/{$subCategory->slug}/{$p->slug}")}}" class="text-secondary text-decoration-none">
            Xem thêm>>
          </a>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
  @else
  <p>
    Danh mục này hiện chưa có bài viết
  </p>
  @endif
</div>

<div class="col-sm pl-5">
  @foreach ($sub_categories as $s)
  <div class="row">
    <div class="col-sm border-top border-primary border-3">
      <p class="text-uppercase font-weight-bold text-primary mt-3">
        {{$s->name}}
      </p>
      <ul class="pl-2">
        @foreach ($posts as $p)
        @php
        $subCategory = App\Category::where('id', $p->category_id)->first();
        @endphp
        <li>
          <a href="{{url("doc/{$main_category->slug}/{$subCategory->slug}/{$p->slug}")}}" class="text-dark text-decoration-none">
            {{$p->title}}
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  @endforeach
</div>

@endsection
