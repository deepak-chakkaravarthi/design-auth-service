<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class RoleController extends Controller
{
    public function assignRole(Request $request, $userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);
    
        // Validate the role_id input
        $role = Role::find($request->input('role_id'));
    
        // Check if role exists and if it's not already assigned to the user
        if ($role && !$user->roles->contains($role)) {
            // Attach the role to the user
            $user->roles()->attach($role);
    
            // Redirect back with success message
            return redirect()->route('user.assign-role', $userId)->with('message', 'Role assigned successfully.');
        }
    
        // If role is already assigned or invalid, return with error message
        return redirect()->route('user.assign-role', $userId)->withErrors(['message' => 'Role already assigned or invalid role.']);
    }
    
    public function removeRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $role = Role::find($request->input('role_id'));
    
        if ($role && $user->roles->contains($role)) {
            // Detach the role
            $user->roles()->detach($role);
            return response()->json(['message' => 'Role removed successfully.']);
        }
    
        return response()->json(['message' => 'Role not found or not assigned to user.'], 400);
    }
    
}
