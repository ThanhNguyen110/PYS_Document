<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function list()
  {
    $categories = Category::where('parent_id', null)->get();
    /* return $categories; */
    return view('theme.index', compact('categories'));
  }
}
