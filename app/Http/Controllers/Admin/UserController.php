<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(25);
        return view('admin.role-permission.users.index', compact('users'));
    }

    public function createUser(){
        $roles = Role::pluck('name','name')->all();
        return view('admin.role-permission.user.create', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // $user->syncRoles($request->roles);

        flash()->success('User Created Successfully!');
        return redirect()->route('users.index');
    }

    public function edit(User $user){
        // $roles = Role::pluck('name','name')->all();
        // $userRoles = $user->roles->pluck('name','name')->all();
        // return view('admin.role-permission.user.edit', compact('user','roles','userRoles'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password)
            ];
        }

        $user->update($data);
        // $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('status', 'User Updated Successfully!');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User Deleted Successfully!');
    }
}
