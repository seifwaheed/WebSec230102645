<?php

namespace App\Http\Controllers\Auth;

abstract class RegisterController
{
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'Customer', // Default role assigned to new users
            'credit' => 100, // Example: Give new customers $100 credit
        ]);
    }
}
