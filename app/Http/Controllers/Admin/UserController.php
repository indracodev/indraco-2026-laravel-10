<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:superadmin,admin,markom'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'username' => explode('@', $request->email)[0]
        ]);

        return back()->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:superadmin,admin,markom'
        ]);

        $data = $request->only(['name', 'email', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Cannot delete yourself.');
        }
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    public function impersonate($id)
    {
        $user = User::findOrFail($id);
        
        // Save original user id in session
        session(['original_user_id' => Auth::id()]);
        
        Auth::login($user);
        
        return redirect('/admin')->with('success', "Logged in as {$user->name}");
    }

    public function leaveImpersonate()
    {
        if (session()->has('original_user_id')) {
            $originalId = session('original_user_id');
            session()->forget('original_user_id');
            
            Auth::loginUsingId($originalId);
            return redirect('/admin')->with('success', 'Returned to original account.');
        }
        
        return redirect('/admin');
    }
}
