<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:Admin,Customer,Employee',
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'User role updated successfully.');
    }
}
