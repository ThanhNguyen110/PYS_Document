<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\SubCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function list($main_slug, $sub_slug = null, $post_slug = null)
  {
    $categories     = Category::where('parent_id', null)
      ->get();
    $main_category  = Category::where('slug', $main_slug)
      ->first();
    $sub_categories = Category::where('parent_id', $main_category->id)
      ->get();

    if ($sub_slug) {
      $mainSubcategory = Category::where('slug', $sub_slug)
        ->first();
      if ($post_slug) {
        $posts = Post::where('slug', $post_slug)
          ->where('status', 'on')
          ->first();
      } else {
        $posts = Post::where('category_id', $mainSubcategory->id)
          ->where('status', 'on')
          ->orderBy('created_at', 'desc')
          ->get();
      }
    } else {
      $subCategories_id = Category::where('parent_id', $main_category->id)
        ->pluck('id');

      $posts            = Post::whereIn('category_id', $subCategories_id)
        ->where('status', 'on')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    if (!empty($sub_slug)) {
      if (!empty($post_slug)) {
        return view('theme.post-detail', compact('categories', 'main_category', 'sub_categories', 'mainSubcategory', 'posts'));
      }
      return view('theme.post-menu', compact('categories', 'main_category', 'sub_categories', 'mainSubcategory', 'posts'));
    } else
      return view('theme.post-menu', compact('categories', 'main_category', 'sub_categories', 'posts'));
  }
}
