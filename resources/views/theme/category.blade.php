@extends('theme.index')
@section('content')
<div class="row">
  <div class="col-sm">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url("doc/{$main_category->slug}")}}">{{$main_category->name}}</a>
        </li>
        @if (isset($mainSubcategory))
        <li class="breadcrumb-item active" aria-current="page">
          {{ Request::is("*{$mainSubcategory->slug}") ? $mainSubcategory->name : "" }}
        </li>
        @endif
      </ol>
    </nav>
  </div>
</div>

<div class="row">
  <div class="col-sm-2 mb-5 pr-0">
    <h4 class="text-primary mb-5">
      {{$main_category->name}}
    </h4>

    @foreach ($sub_categories as $s)
    <p>
      <a href="{{url("doc/{$main_category->slug}/{$s->slug}")}}"
        class="text-secondary text-decoration-none {{ Request::is("*{$s->slug}") ? "active-sub" : "" }}">
        {{$s->name}}
      </a>
    </p>
    @endforeach
  </div>

  @yield('menu')

</div>
@endsection