<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\RoleRequest;
use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id', 'name', 'description', 'status')->with('permissions')->simplePaginate(10);
        return view('admin.user.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::select('id', 'name', 'description', 'status')->simplePaginate(10);
        return view('admin.user.role.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $inputs = $request->only(['name', 'description', 'permissions']);
        $role = Role::create([
            'name' => $inputs['name'],
            'description' => $inputs['description']
        ]);
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-succes', 'نقش جدید با موفقیت ساخته شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Role $role)
    {
        return view('admin.user.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $inputs = $request->only('name', 'description');
        $role->update([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
        ]);
        return redirect()->route('admin.user.role.index')->with('swal-succes', 'نقش با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.user.role.index')->with('swal-succes', 'نقش با موفقیت حذف شد!');
    }

    public function permissionForm(Role $role)
    {
        $permissions = Permission::select('id', 'name', 'description')->get();
        return view('admin.user.role.permission-form', ['role' => $role, 'permissions' => $permissions]);
    }

    public function permissionUpdate(RoleRequest $request,Role $role)
    {
        $inputs = $request->only('permissions');
        $role->permissions()->sync($inputs['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-succes', 'دسترسی ها با موفقیت ویرایش شد!');
    }
}
