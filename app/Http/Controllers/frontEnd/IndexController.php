<?php

namespace App\Http\Controllers\frontEnd;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontEnd.home');
    }

    public function category()
    {
        return view('frontEnd.category.category');
    }

    public function post()
    {
        return view('frontEnd.post.post');
    }


}
