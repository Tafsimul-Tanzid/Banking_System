<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

public function store(Request $request)
{
    // Validate user input
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'account_type' => 'required|in:Individual,Business',
    ]);

    // Create a new user
    $user = User::create($validatedData);

    // You can also implement authentication logic here if needed
    // For example, log the user in after registration

    return response()->json(['message' => 'User registered successfully', 'user' => $user]);
}

public function login(Request $request)
{
    // Implement user authentication logic here
    // Use Laravel's built-in auth functionality

    if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json(['message' => 'User logged in successfully']);
    }

    return response()->json(['message' => 'Invalid login credentials'], 401);
}
}