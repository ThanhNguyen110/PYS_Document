<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
  public function list()
  {
    $categories = Category::paginate(5);
    return view('admin.category.list', compact('categories'));
  }

  public function addMain()
  {
    return view('admin.category.add-main');
  }

  public function addSub()
  {
    $categories = Category::where('parent_id', null)->get();

    return view('admin.category.add-sub', compact('categories'));
  }

  public function storeMain(Request $request)
  {
    $name = $request->input('category');
    $slug = Str::of($name)->slug('-');

    Category::create([
      'name' => $name,
      'slug' => $slug
    ]);

    return redirect('admin/category')->with('status', 'Thêm danh mục chính thành công');
  }

  public function storeSub(Request $request)
  {
    $parent_id = $request->input('category');
    $name      = $request->input('sub_category');
    $slug      = Str::of($name)->slug('-');

    Category::create([
      'parent_id' => $parent_id,
      'name'      => $name,
      'slug'      => $slug
    ]);

    return redirect('admin/category')->with('status', 'Thêm danh mục phụ thành công');
  }

  public function editMain($id)
  {
    $category = Category::find($id);
    return view('admin.category.edit-main', compact('category'));
  }

  public function update(Request $request, $id)
  {
    Category::where('id', $id)->update([
      'title'        => $request->input('title'),
      'content'      => $request->input('content'),
      'sub_category' => $request->input('sub_category')
    ]);
    return redirect('admin/category')->with('status', 'Cập nhật danh mục thành công');
  }

  public function delete($id)
  {
    $posts = Category::find($id);
    $posts->delete();

    return redirect('admin/category')->with('status', 'Xóa danh mục thành công');
  }
}
