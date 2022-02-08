<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\User;

use Intervention\Image\Facades\Image;

class Profilescontroller extends Controller
{
    public function index(User $user)
    {      
        $follows = (auth()->user()) ? auth()->user()->followings->contains($user->id) : false;
        $real = (auth()->user()) ? auth()->user()->id : false;
        return view('profiles.index', compact('user', 'follows', 'real'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $find_users = User::where('username', 'LIKE', '%'.$search_text.'%')->get();
        $real = (auth()->user()) ? auth()->user()->id : false;
        return view('profiles.search', compact('find_users', 'real'));
    }

    public function edit(User $user)
    {
        $this->authorize("update", $user->profile);


        return view('profiles.edit', compact('user'));
    }


    public function update(User $user)
    {
        $this->authorize("update", $user->profile);

        $data = request()->validate([
            'description' => '',
            'text' => '',
            'url' => 'url',
            'image' => 'image',
            'color' => '',
            'bg_image' => 'image',
        ]);
        
        
        if (request('image')) {
            
            $imagePath = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(900, 900);
            
            $image->save();
            
            $imageArray = ['image' => $imagePath];
        }

        else if (request('bg_image')) {
            
            $imagePath = request('bg_image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1400, 800);
            
            $image->save();
            
            $imageArray2 = ['bg_image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge(
            $data, 
            $imageArray2 ?? [],
            $imageArray ?? [],
        ));
        return redirect('/profile/' . auth()->user()->id);
    }

}
