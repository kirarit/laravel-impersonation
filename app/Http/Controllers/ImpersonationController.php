<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('impersonation.home', compact('users'));
    }

    public function impersonate($id)
    {
        $user = Auth::user();
        $toImpersonate = User::findOrFail($id);

        $user->impersonate($toImpersonate);
        return redirect()->route('home')->with('message', 'You are now impersonating user ' . $toImpersonate->name);


        return redirect()->back()->with('error', 'You do not have permission to impersonate this user.');
    }

    public function leave()
    {
        $user = Auth::user();

        $user->leaveImpersonation();
        return redirect()->route('home')->with('message', 'You have stopped impersonating.');

        return redirect()->back()->with('error', 'You are not impersonating anyone.');
    }
}
