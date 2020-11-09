@extends('theme.index')
@section('content')
  <div class="text-center">
    <h4 class="d-inline-block">
      {{ $posts->title }}
    </h4>
  </div>

  <p>
    {!! $posts->content !!}
  </p>
@endsection
