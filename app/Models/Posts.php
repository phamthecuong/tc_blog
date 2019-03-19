<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = ['id', 'title', 'content', 'tag', 'view', 'created_at', 'updated_at', 'created_by', 'category_id'];

    public function thumbnail()
    {
        return $this->hasMany('App\Models\thumbnail', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


}
