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
    public function index()
    {
        $post = Posts::with('user')->get();
        return view('backend.posts.index', compact('post'));
    }

    public function getStore()
    {
        return view('backend.posts.add');
    }

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

    public function show($id, Request $request)
    {
        $post = Posts::find($id);
        return view('backend.posts.edit', compact('post'));
    }

    public function edit($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $post = Posts::find($id);
            $post->title = $request->title;
            $post->content = $request->post_content;
            $post->category_id = $request->category_id;
            $post->tag = null;
            $post->view = 0;
            $post->created_by = Auth::id();
            $post->save();

            DB::commit();
            return redirect()->to('admin/post')->with('sucess', 'Sửa thành công');

        }catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $post = Posts::find($id);

        if ($post) {
            $post->delete();
            return redirect()->to('admin/post')->with('sucess', 'Xóa thành công');
        }

        return redirect()->to('admin/post')->with('error', 'Không tồn tại bài viết');
    }

}
