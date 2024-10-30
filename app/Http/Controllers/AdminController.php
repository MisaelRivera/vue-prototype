<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index ()
    {
        $users = User::paginate(10);
        return Inertia::render('admin/Index', ['users' => $users]);
    }

    public function usersCreate ()
    {
        return Inertia::render('users/Create');
    }

    public function usersStore (StoreUserRequest $request)
    {
        $user = $request->validated();
        $user = User::create($user);
        return redirect()
            ->route('admin.index')
            ->with('message', "Se ha creado el usuario $user->name correctamente");
    }
}
