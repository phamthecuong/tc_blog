<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with('posts')->get();
        return view('backend.category.index', compact('category'));
    }

    public function store(Request $request)
    {
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

    public function getStore()
    {
        return view('backend.category.add');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    public function edit($id, Request $request)
    {
        try {
            DB::beginTransaction();

            $category = Category::find($id);
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

    public function destroy($id)
    {
        $category = Category::with('posts')->find($id);

        if (count($category->posts) == 0) {
            $category->delete();
            return redirect()->to('/admin/category')->with('sucess', 'Xóa thành công');
        }

        return redirect()->to('/admin/category')->with('error', 'Không thể xóa danh mục vì tồn tại bào viết');
    }


}
