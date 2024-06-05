<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.homeAdmin');
    }

    public function profile(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('admin.adminPage', compact('users'));
    }

    public function showLoginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.loginAdmin');
    }

    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::findOrFail($id);
        return view('admin.editProfileAdmin', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.profile');
    }
}
