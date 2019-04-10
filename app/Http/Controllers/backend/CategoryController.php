<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function index()
    {
        $this->authorize('View_category');

        $category = Category::with('posts')->get();
        return view('backend.category.index', compact('category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function store(Request $request)
    {
        $this->authorize('create_caetgory');

        try {
            DB::beginTransaction();

            $category = new Category();
            $category->name = $request->name;
            $category->weight = $request->weight;
            $category->save();

            DB::commit();

            session()->flash('error', 'Thêm mới thành công');
            return redirect()->to('/admin/category');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function getStore()
    {
        $this->authorize('create_category');
        return view('backend.category.add');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function edit($id, Request $request)
    {
        $this->authorize('edit_category');

        try {
            DB::beginTransaction();

            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->weight = $request->weight;
            $category->save();

            DB::commit();

            session()->flash('sucess', 'sửa thành công');
            return redirect()->to('/admin/category');

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
        $this->authorize('delete_category');

        $category = Category::with('posts')->find($id);

        if (count($category->posts) == 0) {
            $category->delete();
            return redirect()->to('/admin/category')->with('sucess', 'Xóa thành công');
        }

        return redirect()->to('/admin/category')->with('error', 'Không thể xóa danh mục vì tồn tại bào viết');
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function detail($categoryId)
    {
        $posts = Posts::query()->where('category_id', $categoryId)->paginate(10);

        return view('backend.category.post', compact('posts'));
    }



}
