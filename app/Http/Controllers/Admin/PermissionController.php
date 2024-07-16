<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::get();
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

        return redirect('/admin/permissions')->with('status', 'Permission Created Successfully!');
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
