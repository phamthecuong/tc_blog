<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['id','name', 'weight', 'created_at', 'updated_at'];

    public function posts()
    {
        return $this->hasMany('App\Models\Posts', 'category_id');
    }

    public static function getCategory()
    {
        $data = [];
        $category = Category::all();

        if (!empty($category)) {
            foreach ($category as $c) {
                $data[] = ['id' => $c->id, 'name' => $c->name];
            }
        }

        return $data;
    }

}
