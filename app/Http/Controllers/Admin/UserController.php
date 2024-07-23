<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(25);
        return view('admin.role-permission.user.index', compact('users'));
    }

    public function create(){

    }

    public function store(){
        
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){
        
    }
}
