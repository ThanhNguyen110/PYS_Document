<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{
  public function list(Request $request)
  {
    $keyword = $request->input("search");
    $posts   = Post::where('title', 'LIKE', '%' . $keyword . '%')
      ->where('status', 'on')
      ->get();

    if ($request->ajax()) {
      if (count($posts) > 0) {
        $output = "<ul class='list-group d-block position-absolute'>";
        foreach ($posts as $p) {
          $output .=
            "<li class='list-group-item'>"
            . $p->title .
            "</li>";
        }
        $output .= '</ul>';
      } else {
        $output =
          "<ul class='list-group position-absolute'>" .
          "<li class='list-group-item'>" .
          "Không tìm thấy bài viết" .
          "</li>" .
          "</ul>";
      }
    }
    return $output;
  }

  public function result(Request $request)
  {
    $categories = Category::where('parent_id', null)->get();
    $keyword = $request->input("search");
    $posts   = Post::where('title', 'LIKE', '%' . $keyword . '%')
      ->where('status', 'on')
      ->paginate(5);

    return view("theme.search", compact("categories", "posts"));
  }
}
