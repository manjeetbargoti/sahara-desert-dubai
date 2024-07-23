<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::paginate(25);
        return view('admin.role-permission.permission.index', compact('permissions'));
    }

    public function create(){
        return view('admin.role-permission.permission.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required','string','unique:permissions,name']
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')->with('status', 'Permission Created Successfully!');
    }

    public function edit(Permission $permission){
        return view('admin.role-permission.permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission){
        $request->validate([
            'name' => ['required','string','unique:permissions,name,'.$permission->id]
        ]);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect()->route('permissions.index')->with('status', 'Permission Updated Successfully!');
    }

    public function destroy($id){
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('status', 'Permission Deleted Successfully!');
    }
}
