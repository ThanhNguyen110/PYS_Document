<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    'parent_id',
    'name',
    'slug'
  ];

  public function posts(){
    return $this->hasMany('App\Post');
  }
}
