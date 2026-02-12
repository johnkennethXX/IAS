<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Only show this if the user is actually an admin
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function destroy(User $user)
    {
        // Prevent deleting yourself
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }
}