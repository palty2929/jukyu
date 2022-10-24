<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->get();

        return Inertia::render('User/Index',[
            'users'=> $users
        ]);
    }
}
