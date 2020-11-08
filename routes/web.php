<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('doc');
});

Route::get('doc', 'CategoryController@list');
Route::get('doc/search/list', 'SearchController@list');
Route::get('doc/search/result', 'SearchController@result');
Route::get('doc/{main_slug}/{sub_slug?}/{post_slug?}', 'PostController@list');

Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@list');

  Route::get('category', 'AdminCategoryController@list');
  Route::get('category/addMain', 'AdminCategoryController@addMain');
  Route::get('category/addSub', 'AdminCategoryController@addSub');
  Route::post('category/storeMain', 'AdminCategoryController@storeMain');
  Route::post('category/storeSub', 'AdminCategoryController@storeSub');
  Route::get('category/editMain/{id}', 'AdminCategoryController@editMain')->name('category.editMain');
  Route::get('category/editSub/{id}', 'AdminCategoryController@editSub')->name('category.editSub');
  Route::post('category/update/{id}', 'AdminCategoryController@update')->name('category.update');
  Route::get('category/delete/{id}', 'AdminCategoryController@delete')->name('category.delete');

  Route::get('post', 'AdminPostController@list');
  Route::get('post/add', 'AdminPostController@add');
  Route::post('post/store', 'AdminPostController@store');
  Route::get('post/edit/{id}', 'AdminPostController@edit')->name('post.edit');
  Route::post('post/update/{id}', 'AdminPostController@update')->name('post.update');
  Route::get('post/delete/{id}', 'AdminPostController@delete')->name('post.delete');
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});
