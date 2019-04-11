<?php

namespace App\Http\Controllers\frontEnd;

use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $limit = $request->limit + 1;

            $posts = Posts::query()
                ->orderBy('created_at', 'desc')
                ->paginate($limit, ['*'],'page', $request->page);


            return response()->json($posts->items());
        }

        $posts = Posts::query()->limit(8)
            ->orderBy('created_at', 'desc')
            ->get();

        $posts_new = Posts::query()->limit(2)
            ->orderBy('created_at', 'desc')
            ->orderBy('view', 'desc')
            ->get();

        $category_post['tech'] = Posts::query()->where('category_id', 2)->limit(12)->get()->toArray();
        $category_post['dev'] = Posts::query()->where('category_id', 3)->limit(12)->get()->toArray();
        $category_post['resources'] = Posts::query()->where('category_id', 4)->limit(12)->get()->toArray();
        return view('frontEnd.home', compact('posts', 'posts_new', 'category_post'));
    }

}
