<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  <script src="https://cdn.tiny.cloud/1/hiio4n2esmuaf8c701sdk2zpeetbcs4761t59z25h3l9kwmp/tinymce/4/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script>
    var editor_config = {
    path_absolute : "http://localhost/test4/",
    selector: "textarea",
    height: 400,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
  </script>

  <title>Trang quản trị</title>
</head>

<body>
  <div id="warpper" class="nav-fixed">
    <nav class="topnav shadow navbar-light bg-warning d-flex">
      <div class="navbar-brand">
        <a href="{{url('admin')}}">ADMIN</a>
      </div>
      <div class="nav-right ">
        <div class="btn-group mr-auto">
          {{-- <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="plus-icon fas fa-plus-circle"></i>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{url('admin/post/add')}}">Thêm bài viết</a>
          <a class="dropdown-item" href="{{url('admin/product/add')}}">Thêm sản phẩm</a>
          <a class="dropdown-item" href="{{url('admin/order/list')}}">Xem đơn hàng</a>
        </div> --}}
      </div>

      {{-- <div class="btn-group dropleft">
        <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <span class="badge badge-light">
            5
          </span>
        </button>
        <div class="dropdown-menu">
        </div>
      </div> --}}

      {{-- <div class="btn-group">
        <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <b>{{Auth::user()->name}}</b>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
  </div> --}}
  </div>
  </nav>
  <!-- end nav  -->
  <div id="page-body" class="d-flex">
    <div id="sidebar" class="bg-dark">
      <ul id="sidebar-menu">
        <li class="nav-link {{ Request::is('*category') ? 'active' : '' }}">
          <a href="{{url('admin/category')}}">
            <div class="nav-link-icon d-inline-flex">
              {{-- <i class="fas fa-tasks icon-color"></i> --}}
            </div>
            Danh mục
          </a>
          <i class="arrow fas fa-angle-right icon-color"></i>
          <ul class="sub-menu">
            <li>
              <a href="{{url('admin/category')}}">
                {{-- <i class="fas fa-paper-plane icon-color"></i> --}}
                Danh sách
              </a>
            </li>
            <li>
              <a href="{{url('admin/category/addMain')}}">
                {{-- <i class="fas fa-comment-dots icon-color"></i> --}}
                Thêm danh mục chính
              </a>
            </li>
            <li>
              <a href="{{url('admin/category/addSub')}}">
                {{-- <i class="fas fa-comment-dots icon-color"></i> --}}
                Thêm danh mục phụ
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-link {{ Request::is('*post*') ? 'active' : '' }}">
          <a href="{{url('admin/post')}}">
            <div class="nav-link-icon d-inline-flex">
              {{-- <i class="fas fa-ad icon-color"></i> --}}
            </div>
            Bài viết
          </a>
          <i class="arrow fas fa-angle-right icon-color"></i>
          <ul class="sub-menu">
            <li>
              <a href="{{url('admin/post')}}">
                {{-- <i class="fas fa-map icon-color"></i> --}}
                Danh sách
              </a>
            </li>
            <li>
              <a href="{{url('admin/post/add')}}">
                {{-- <i class="fas fa-map icon-color"></i> --}}
                Thêm bài viết
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div id="wp-content">
      @yield('content')
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>