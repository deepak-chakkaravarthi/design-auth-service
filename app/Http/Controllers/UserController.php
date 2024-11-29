<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user], 201);
        
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['user' => $user]);
    }

    public function delete($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'User deleted successfully']);
    }


    public function getUserDetails($id)
{
    try {
        // Fetch user with roles and permissions
        $user = User::with('roles.permissions')->find($id);

        // Check if user exists
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        // Return user details
        return response()->json([
            'message' => 'User details retrieved successfully',
            'user' => $user,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred',
            'error' => $e->getMessage(),
        ], 500);
    }
}


public function getAllUsers(Request $request)
{
    $users = User::paginate(10); // Adjust the number as needed
    return view('users.index', compact('users'));
}


public function showAssignRoleForm($userId)
{
    $user = User::findOrFail($userId);
    return view('users.assign-role', compact('user'));
}


// In UserController.php
public function show($id)
{
    $user = User::findOrFail($id); // Find the user by ID
    return view('users.details', compact('user')); // Return the details view with user data
}


public function showRemoveRoleForm($userId)
{
    $user = User::findOrFail($userId);
    return view('users.remove-role', compact('user'));
}


public function updateUserForm($userId)
{
    $user = User::findOrFail($userId);
    return view('users.update-user', compact('user'));
}

}

