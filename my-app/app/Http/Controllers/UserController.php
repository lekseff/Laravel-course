<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUsers()
    {
        $users =
            [
                [
                    'name' => 'Alex',
                    'age' => 23
                ],
                [
                    'name' => 'Ivan',
                    'age' => 12
                ],
                [
                    'name' => 'Serg',
                    'age' => 45
                ],
                [
                    'name' => 'Jon',
                    'age' => 32
                ]
            ];
        foreach ($users as $user)
        {
            User::class::create($user);
        }
    }

    public function getUsers()
    {
        $users = User::class::all();
        return view('users', compact('users'));
    }
}
