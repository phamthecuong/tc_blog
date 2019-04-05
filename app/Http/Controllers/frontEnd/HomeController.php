<?php

namespace App\Http\Controllers\frontEnd;

use App\Models\Posts;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $posts = Posts::query()->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();

        $posts_new = Posts::query()->limit(2)
            ->orderBy('created_at', 'desc')
            ->orderBy('view', 'desc')
            ->get();

        return view('frontEnd.home', compact('posts', 'posts_new'));
    }

}
