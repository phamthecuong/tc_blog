<?php

namespace App\Http\Controllers\backend;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function index(Request $request)
    {
        $this->authorize('view_post');

        $page = $request->get('page', 1);

        $post = Posts::with('user');

        if (!empty($request->title)) {
            $post->where('title', 'like', "%{$request->title}%");
        }

        if (!empty($request->category)) {
            $post->where('category_id', $request->category);
        }

        $post = $post->paginate(10, ['*'], 'page', $page);

        return view('backend.posts.index', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function getStore()
    {
        $this->authorize('create_post');

        return view('backend.posts.add');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function store(Request $request)
    {
        $this->authorize('create_post');

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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function edit($id, Request $request)
    {
        $this->authorize('edit_post');

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
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function destroy($id)
    {
        $this->authorize('delete_post');

        $post = Posts::findOrFail($id);

        if ($post) {
            $post->delete();
            return redirect()->to('admin/post')->with('sucess', 'Xóa thành công');
        }

        return redirect()->to('admin/post')->with('error', 'Không tồn tại bài viết');
    }

}
