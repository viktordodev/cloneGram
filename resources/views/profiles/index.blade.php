@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>


        <div class="col-9">
            <div class="d-flex justify-content-between align-baseline">
            <h1>{{ $user->username }}</h1>

<follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @can('update', $user->profile)
                <a href="/p/create" class="align-self-lg-end">Add new post</a>
                @endcan

            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-4">
                    <strong>{{$postCount}}</strong> posts
            </div>
                <div class="pr-4">
                    <strong>{{$followersCount}}</strong> followers
                </div>
                <div class="pr-4">
                    <strong>{{$followingCount}}</strong> following
                </div>
            </div>

            <div class="">
                <div><h3>{{ $user->profile->title ?? 'Default title'}}</h3></div>
                <div><p>{{ $user->profile->description ?? 'Default Description' }}</p></div>
                <div><a target="_blank" href="">{{ $user->profile->url ?? 'Url'  }}</a></div>
            </div>
        </div>


    </div>
    <div class="row pt-4">
        @foreach ($user->posts as $post)
      <div class="col-4 pb-5">
    <a href="/p/{{$post->id}}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
       </div>

        @endforeach

    </div>

</div>
@endsection
