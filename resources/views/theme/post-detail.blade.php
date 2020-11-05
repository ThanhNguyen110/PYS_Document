@extends('theme.index')
@section('content')
<h4>
  {{$posts->title}}
</h4>

{{-- <div class="text-center">
  <img src="{{asset("image/post/$posts->thumbnail")}}" width="500px">
</div> --}}

<p>
  {!!$posts->content!!}
</p>
@endsection