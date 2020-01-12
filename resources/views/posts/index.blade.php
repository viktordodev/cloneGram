@extends('layouts.app')

@section('content')
<div class="container">
@foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}"></a></div>
          </div>
    <div class="row pt-2 pb-4">
        <div class="col-6 offset-3">
<div>
                <p>

                    <span><a href="/profile/{{$post->user->profile->user_id}}"> <span class="text-dark" style="font-weight: bold;" > {{$post->user->username}}</span></a>
                    {{$post->caption}}</p>
            </div>

        </div>
        </div>

@endforeach
    <div class="row d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection
