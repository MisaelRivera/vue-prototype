<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

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

    public function usersEdit (User $user)
    {
        return Inertia::render('users/Edit', ['user' => $user]);
    }

    public function usersUpdate (EditUserRequest $request, User $user)
    {
        $newUser = $request->validated();
        $user->name = $newUser['name'];
        $user->email = $newUser['email'];
        $user->save();
        return redirect()
            ->route('admin.index')
            ->with('message', "Se ha editado el usuario $user->name correctamente");
    }

    public function usersUpdatePassword (UpdateUserPasswordRequest $request, User $user)
    {
        
    }

    public function usersDestroy (User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.index');
    }

    public function rolesIndex ()
    {
        $roles = Role::paginate(10);
        return Inertia::render('roles/Index', [
            'roles' => $roles
        ]);
    }

    public function rolesCreate ()
    {
        return Inertia::render('roles/Create');
    }

    public function rolesStore (StoreRoleRequest $request)
    {
        $role = $request->validated();
        $newRole = Role::create($role);
        return redirect()
            ->route('roles.index')
            ->with("message", "El rol $newRole->name se creo correctamente");
    }

    public function rolesEdit (Role $role)
    {
        return Inertia::render('roles/Edit', [
            'role' => $role
        ]);
    }

    public function rolesUpdate (UpdateRoleRequest $request, Role $role)
    {
        $newRole = $request->validated();
        $role->name = $newRole['name'];
        $role->save();
        return redirect()
            ->route('admin.index')
            ->with('message', "Se ha editado el usuario $role->name correctamente");
    }
}
