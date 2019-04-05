<?php

namespace App\Http\Controllers\backend;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\ExpectationFailedException;

class PostController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $post = Posts::with('user')->paginate(10);
        return view('backend.posts.index', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getStore()
    {
        return view('backend.posts.add');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $post = new Posts();
            $post->title = $request->title;
            $post->content = $request->post_content;
            $post->category_id = $request->category_id;
            $post->tag = null;

            if ($request->hasFile('thumbnail')) {
                $file = $request->thumbnail;
                $file->move('upload', $file->getClientOriginalName());
                $post->thumbnail = $file->getClientOriginalName();
            }
            $post->view = 0;
            $post->created_by = Auth::id();
            $post->save();

            DB::commit();
            return redirect()->to('admin/post')->with('sucess', 'Tạo mới thành công');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id, Request $request)
    {
        $post = Posts::findOrFail($id);
        return view('backend.posts.edit', compact('post'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function edit($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $post = Posts::findOrFail($id);
            $post->title = $request->title;
            $post->content = $request->post_content;
            $post->category_id = $request->category_id;
            $post->tag = null;
            $post->view = 0;
            $post->created_by = Auth::id();
            $post->save();

            DB::commit();
            return redirect()->to('admin/post')->with('sucess', 'Sửa thành công');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);

        if ($post) {
            $post->delete();
            return redirect()->to('admin/post')->with('sucess', 'Xóa thành công');
        }

        return redirect()->to('admin/post')->with('error', 'Không tồn tại bài viết');
    }

}
