<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
  public function list(Request $request)
  {
    $keyword = $request->input('search');
    $posts   = Post::where('title', 'LIKE', '%' . $keyword . '%')
      ->orderBy('updated_at', 'desc')
      ->paginate(5);
    return view('admin.post.list', compact('posts'));
  }

  public function add()
  {
    $categories     = Category::where('parent_id', null)->get();
    $sub_categories = Category::where('parent_id', '!=', null)->get();

    return view('admin.post.add', compact('categories', 'sub_categories'));
  }

  public function store(Request $request)
  {
    $title       = $request->input('title');
    $content     = $request->input('content');
    $category_id = $request->input('sub_category');
    $status      = $request->input('status');
    $description = $request->input('description');
    $slug        = Str::of($title)->slug('-');

    $file     = $request->file('thumbnail');
    $fileName = $file->getClientOriginalName();
    $file->move('public/image/post/', $fileName);

    Post::create([
      'title'       => $title,
      'content'     => $content,
      'category_id' => $category_id,
      'status'      => $status,
      'description' => $description,
      'slug'        => $slug,
      'thumbnail'   => $fileName
    ]);

    return redirect('admin/post')->with('status', 'Đã thêm bài viết thành công');
  }

  public function edit($id)
  {
    $posts          = Post::find($id);
    $categories     = Category::where('parent_id', null)->get();
    $sub_categories = Category::where('parent_id', '!=', null)->get();

    return view('admin.post.edit', compact('posts', 'categories', 'sub_categories'));
  }

  public function update(Request $request, $id)
  {
    $title       = $request->input('title');
    $content     = $request->input('content');
    $category_id = $request->input('sub_category');
    $status      = $request->input('status');
    $description = $request->input('description');
    $slug        = Str::of($title)->slug('-');

    Post::where('id', $id)->update([
      'title'       => $title,
      'content'     => $content,
      'status'      => $status,
      'description' => $description,
      'category_id' => $category_id,
      'slug'        => $slug
    ]);
    return redirect('admin/post')->with('status', 'Đã cập nhật bài viết thành công');
  }

  public function delete($id)
  {
    $posts = Post::find($id);
    $posts->delete();
    return redirect('admin/post')->with('status', 'Đã xóa bài viết thành công');
  }
}
