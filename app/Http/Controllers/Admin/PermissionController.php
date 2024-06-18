<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view', PermissionController::class);
        $query = Permission::query();
        $keyword = $request->get('keyword');
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        $permissions = $query->paginate(10);
        return view('admin.pages.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', PermissionController::class);
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', PermissionController::class);
        Permission::create(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', "Tạo quyền thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', PermissionController::class);
        $permission = Permission::find($id);
        return view('admin.pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', PermissionController::class);
        $permission = Permission::find($id);
        $permission->update(['name' => $request->name]);
        return redirect()->route('permissions.index')->with('success', "Cập nhật quyền thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->authorize('delete', PermissionController::class);
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', "Xóa quyền thành công");
    }
}
