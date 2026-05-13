<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:user,print operator,admin'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('status', 'user-created');
    }

    public function show()
    {   
        $id = auth()->id();
        if ($id !== auth()->id()) {
            abort(403);
        }
        
        $user = User::findOrFail($id);

        return view('settings_page', compact('user'));
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Incorrect current password']);
    }
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function updateUser(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
        ]);
        $user = auth()->user();
        $user->name = $request->username;
        $user->save();

        return redirect()->back()->with('success', 'Username updated successfully!');
    }

    public function updateRolesBulk(Request $request)
    {   
        $request->validate([
        'roles' => ['required', 'array'],
        'roles.*' => ['required', 'in:user,print operator,admin'],
        ]);
        foreach ($request->roles as $userId => $role) {
            User::where('id', $userId)->update(['role' => $role]);
        }
        return redirect()->back()->with('success', 'User role updated successfully!');
    }

    
}

