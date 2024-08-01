<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index(){
        $staffs = Admin::with('role')->latest()->paginate(25);
        return view('admin.role-permission.staff.index', compact('staffs'));
    }

    public function createStaff(Request $request){
        $roles = Role::get();

        if($request->isMethod('POST')){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:191|unique:admins,email',
                'phone' => 'required|numeric',
                'password' => 'required|string|min:8|max:20',
                'role' => 'required'
            ]);

            $staff = new Admin();
            $staff->name = $request->name;
            $staff->email = $request->email;
            $staff->phone = $request->phone;
            $staff->password = Hash::make($request->password);
            $staff->role_id = $request->role;
            $staff->status = 1;
            $staff->banned = 0;

            $staff->save();
    
            return redirect()->route('admin.staff.index')->with('status', 'Staff Created Successfully!');
        }

        return view('admin.role-permission.staff.create', compact('roles'));
    }

    public function editStaff(Request $request){
        $staff = Admin::findOrFail($request->id);
        $roles = Role::get();

        if($request->isMethod('PUT')){
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:191',
                'phone' => 'required|numeric',
                'role' => 'required'
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'status' => 1,
                'banned' => 0
            ];

            if(!empty($request->password)){
                $request->validate([
                    'password' => 'string|min:8|max:20',
                ]);

                $data += [
                    'password' => Hash::make($request->password)
                ];
            }

            $staff->update($data);

            return redirect()->route('admin.staff.index')->with('status', 'Staff Updated Successfully!');
        }

        return view('admin.role-permission.staff.edit', compact('staff','roles'));
    }

    public function staffDelete(Request $request){
        $staff = Admin::find($request-> id);
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('status', 'Staff Deleted Successfully!');
    }
}
