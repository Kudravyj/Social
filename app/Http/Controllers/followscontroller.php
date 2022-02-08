<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;

class followscontroller extends Controller
{
    public function store(User $user)
    {
        return auth()->user()->followings()->toggle($user->profile);
    }
    public function isfollow(User $user)
    {
        return auth()->user()->followings()->toggle($user->profile);
    }

    public function show(User $user)
    {
        $followings = $user->followings;
        $real = (auth()->user());
        return view('profiles.followings', compact('user', 'followings', 'real'));
    }
    public function go(User $user)
    {
        $followers = $user->profile->followers;
        $real = (auth()->user());
        return view('profiles.followers', compact('user', 'followers', 'real'));
    }

    public function index(User $user)
    {
        $user = auth()->user()->followings();
        return view('profiles.edit', compact('user'));
    }
}
