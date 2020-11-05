<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PYS Document</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

  <div id="wrapper">
    <div class="container">
      <div class="row pt-3 pb-3">

        <div class="col-6 col-sm-5 m-auto">
          <a href="{{url('/')}}">
            <img src="https://pystravel.vn/image/logo-2.png" id="logo">
          </a>
        </div>

        <div class="col col-sm m-auto">
          <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-dark">
            <span class="navbar-brand"></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
              data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-white" href="#">Tổng quan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-white" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-white" href="#">Phí dịch vụ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-white" href="#">Hợp tác</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-white" href="#">Tin tức</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link font-weight-bold text-white" href="#">Liên hệ</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <header>
    <div class="container">
      <div class="row pt-5 pb-5" id="nav">
        <div class="col-sm-6 offset-sm-3">
          <form action="{{url("doc/search")}}" method="GET" autocomplete="off">
            <div class="input-group">
              <div class="input-group-prepend">
                <button type="submit" class="input-group-text form-control">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              <input type="search" name="search" class="form-control" id="inlineFormInputGroup"
                placeholder="Chúng tôi có thể giúp bạn như thế nào?">
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              @foreach ($categories as $c)
              <a class="nav-link {{ Request::is("*{$c->slug}*") ? 'active' : '' }}" id="nav-tab"
                href="{{url("doc/{$c->slug}")}}" role="tab" aria-controls="nav" aria-selected="false">
                {{$c->name}}
              </a>
              @endforeach
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="container mt-3">
    @yield('content')
  </div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
<script src="{{asset('js/style.js')}}"></script>

</html>