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

            $posts = Posts::query()
                ->orderBy('created_at', 'desc')
                ->paginate(3,['*'],'page',$request->page);


            return response()->json($posts->items());
        }

        $posts = Posts::query()->limit(6)
            ->orderBy('created_at', 'desc')
            ->get();

        $posts_new = Posts::query()->limit(2)
            ->orderBy('created_at', 'desc')
            ->orderBy('view', 'desc')
            ->get();

        return view('frontEnd.home', compact('posts', 'posts_new'));
    }

}
