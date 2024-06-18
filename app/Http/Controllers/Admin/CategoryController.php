<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', CategoryController::class);
        $categories = Category::paginate(10);
        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', CategoryController::class);
        $categories = Category::query();
        $categories = $categories->whereNull('parent_id');
        $categories = $categories->get();
        return view('admin.pages.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', CategoryController::class);
        $dataTodo = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ];

        Category::create($dataTodo);

        return redirect()->route('categories.index')->with('success', 'Tạo danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('update', CategoryController::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', CategoryController::class);
        $cate = Category::find($id);
        $categories = Category::query();
        $categories = $categories->whereNull('parent_id')->where('id', '<>', $id);
        $categories = $categories->get();
        return view('admin.pages.categories.edit', compact('cate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', CategoryController::class);
        $dataTodo = [
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ];
        $category = Category::find($id);
        $category->update($dataTodo);
        return redirect()->route('categories.index')->with('success', 'Cập nhập danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', CategoryController::class);
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công');
    }
}
