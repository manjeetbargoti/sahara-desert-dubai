<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Display list of all roles
    public function index(){
        $roles = Role::latest()->paginate(25);
        return view('admin.role-permission.role.index', compact('roles'));
    }

    // Create new role
    public function create(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => ['required','string','unique:roles,name']
            ]);

            $role = New Role();
            $role->name = $request->name;
            $role->display_name = $request->name;
            $role->user_type = strtolower($request->name);
            $role->status = 1;
            
            $role->save();
    
            return redirect()->route('admin.roles.index')->with('success', 'Role Created Successfully!');
        }

        return view('admin.role-permission.role.create');
    }

    // Update role information
    public function edit(Request $request, $id){
        $role = Role::findOrfail($id);
        
        if($request->isMethod('PUT')){
            $request->validate([
                'name' => ['required','string']
            ]);

            if(!empty($role->name)){
                if($request->status == 'on'){
                    $status = 1;
                }else{
                    $status = 0;
                }
                
                $role->name = $request->name;
                $role->display_name = $request->name;
                $role->user_type = strtolower($request->name);
                $role->status = $status;
                
                $role->save();
        
                return redirect()->route('admin.roles.index')->with('success', 'Role Updated Successfully!');
            }else{
                return redirect()->route('admin.roles.index')->with('error', 'Something went wrong!');
            }
        }

        return view('admin.role-permission.role.edit', compact('role'));
    }

    // Delete role
    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role Deleted Successfully!');
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

        return redirect()->back()->with('success', 'Permissions added to Role Successfully!');
    }
}
