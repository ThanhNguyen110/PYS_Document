<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function list(Request $request)
  {
    $categories = Category::where('parent_id', null)->get();

    $keyword    = $request->input("search");
    $posts      = Post::where('title', 'LIKE', '%' . $keyword . '%')
      ->where('status', 'on')
      ->paginate(5);

    return view("theme.search", compact("categories", "posts"));
  }
}
