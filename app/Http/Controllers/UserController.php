<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()
            ->orderBy('id', 'desc')
            ->orderBy('roll', 'asc')
            ->paginate(20);

        return Inertia::render('User/Index', [
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $user = User::withTrashed()->find($id);

        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'roll' => ['integer', 'digits_between:1,2', 'required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->fill($validate);
        $user->save();

        return redirect()->route('user.edit', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.edit', $user->id);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();

        return redirect()->route('user.edit', $user->id);
    }
}
