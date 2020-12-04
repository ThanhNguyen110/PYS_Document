<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function list(Request $request)
  {
    $keyword = $request->input("search");
    $posts   = Post::where('title', 'LIKE', '%' . $keyword . '%')
      ->where('status', 'on')
      ->get();

    if ($request->ajax()) {
      if (count($posts) > 0 && !empty($keyword)) {
        $output = "<ul class='list-group d-block position-absolute'>";
        foreach ($posts as $p) {
          $subCategory = Category::where('id', $p->category_id)->first();
          $mainCategory = Category::where('id', $subCategory->parent_id)->first();
          $output .=
            "<li class='list-group-item'>" .
            "<a href=" . url("doc/{$mainCategory->slug}/{$subCategory->slug}/{$p->slug}") . ">" .
            $p->title .
            "</a>" .
            "</li>";
        }
        $output .= '</ul>';
      } else {
        $output = "";
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
