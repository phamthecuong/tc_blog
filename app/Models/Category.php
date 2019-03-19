<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['id','name', 'weight'];

    public function posts()
    {
        return $this->hasMany('App\Models\Posts', 'category_id');
    }

    public static function getCategory()
    {
        $data = [];
        $category = Category::all();
        foreach ($category as $c) {
            $data[] = ['id' => $c->id, 'name' => $c->name];
        }
        return $data;
    }

}
