@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8"><img src="/storage/{{$post->image}}"></div>
        <div class="col-4">
            <div class="d-flex align-items-center justify-content-start">
                <div><img class="rounded-circle w-25" src="{{$post->user->profile->profileImage()}}"></div>
                <div>
             <a href="/profile/{{$post->user->profile->user_id}}"> <span class="text-dark"> {{$post->user->username}}</span></a>
<a href="#" class="pr-3">Follow</a>
                </div>

                </div>
            <hr>
<div>
                <p>

                    <span><a href="/profile/{{$post->user->profile->user_id}}"> <span class="text-dark" style="font-weight: bold;" > {{$post->user->username}}</span></a>
                    {{$post->caption}}</p>
            </div>

        </div>
    </div>

</div>
@endsection
