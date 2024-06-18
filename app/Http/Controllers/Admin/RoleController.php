<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view', RoleController::class);
        $roles = Role::paginate(10);

        return view('admin.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', RoleController::class);
        $permissions = Permission::all();
        return view('admin.pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', RoleController::class);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with('success', "Tạo vai trò thành công");
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
        $this->authorize('update', RoleController::class);
        $role = Role::findOrFail($id);
        $rolePermission = $role->permissions->pluck('name')->all();
        $permissions = Permission::all();
        return view('admin.pages.roles.edit', compact('role', 'permissions', 'rolePermission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', RoleController::class);
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with('success', "Sửa vai trò thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', RoleController::class);
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', "Xóa vai trò thành công");
    }
}
