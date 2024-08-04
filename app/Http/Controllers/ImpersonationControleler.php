<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ImpersonationControleler extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('impersonation.home', compact('users'));
    }
}
