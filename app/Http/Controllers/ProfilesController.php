<?php

namespace App\Http\Controllers;
use App\User;

use App\Profile;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user)
    {

        $follows = (auth()->user()) ? auth()->user()->following->contains(auth()->user()->id) : false;
        $user = User::findorFail($user);
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function() use ($user){
          return  $user->posts->count();
        });
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles/index',compact('user', 'follows', 'postCount','followingCount', 'followersCount'));
    }

    public function edit (User $user){
        return view('profiles.edit', compact('user'));

    }

    public function update(User $user){

        $this->authorize('update', $user->profile);
        $data = request()->validate([
           'title' => 'string',
            'description' => 'string',
            'url' => 'url',
            'image' => 'image',

        ]);


         if (request('image')) {
             $imagepath = request('image')->store('profile', 'public');

             $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000);
             $image->save();
             auth()->user()->profile->update(array_merge(
                 $data,
                 ['image' => $imagepath]
             ));

         }

        else {

            auth()->user()->profile->update($data);
        }

        return redirect("/profile/{$user->id}");
    }


}
