<?php

namespace App\Http\Controllers\Models;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', [
            "doc_title" => "User",
            "page_title" => "UC Showroom",
            "users" => $users,
        ]);
    }

    public function create()
    {
        return view('admin.user.form', [
            "doc_title" => "User",
            "page_title" => "UC Showroom",
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|max:255',
        ]);
        
        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        return redirect()->back();
    }

    public function storeFromArray(array $data)
    {
        
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.index', [
            "doc_title" => "User",
            "page_title" => "UC Showroom",
            "users" => $users,
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.form', [
            "doc_title" => "User",
            "page_title" => "UC Showroom",
            "user" => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|max:255',
        ]);

        $user->update([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}