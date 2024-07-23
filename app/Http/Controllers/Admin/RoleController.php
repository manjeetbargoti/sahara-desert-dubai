<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Display list of all roles
    public function index(){
        $roles = Role::paginate(25);
        return view('admin.role-permission.role.index', compact('roles'));
    }

    // Display create new role form
    public function create(){
        return view('admin.role-permission.role.create');
    }

    // Create new role with information
    public function store(Request $request){
        $request->validate([
            'name' => ['required','string','unique:roles,name']
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('status', 'Role Created Successfully!');
    }

    // Display form for edit role
    public function edit(Role $role){
        return view('admin.role-permission.role.edit', compact('role'));
    }

    // Update role information
    public function update(Request $request, Role $role){
        $request->validate([
            'name' => ['required','string','unique:roles,name,'.$role->id]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('status', 'Role Updated Successfully!');
    }

    // Delete role
    public function destroy($id){
        $roleId = decrypt($id);
        $role = Role::find($roleId);
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role Deleted Successfully!');
    }

    // Add permissions to role
    public function addPermissionsToRole($id){
        $permissions = Permission::get();
        $role = Role::findOrFail(decrypt($id));

        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', decrypt($id))
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('admin.role-permission.role.add-permissions', compact('permissions','role','rolePermissions'));
    }

    // Assign permissions to role
    public function givePermissionsToRole(Request $request, $id){
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status', 'Permissions added to Role Successfully!');
    }
}
