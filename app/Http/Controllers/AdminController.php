<?php

namespace App\Http\Controllers;

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
}
