<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', Tag::class);
        $tags = Tag::paginate(10);
        return view('admin.pages.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Tag::class);
        return view('admin.pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $this->authorize('create', Tag::class);
        try {
            DB::beginTransaction();
            $name = $request->name;
            $dataTodo = [
                'name' => $name,
                'slug' => Str::slug($name)
            ];
            Tag::create($dataTodo);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Có lỗi xảy ra vui lòng thử lại');
        }
        return redirect()->route('tags.index')->with('success', 'Tạo từ khóa thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('update', Tag::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', Tag::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', Tag::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Tag::class);
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('success', "Xóa từ khóa thành công.");
    }
}
