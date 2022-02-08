@extends('layouts.app')

@section('content')
<section class="Profil">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="profilecard row d-flex" style="background-image: url('{{ $user->profile->profile_bg_Image() }}'); background-size: cover;">
                        <div class="col-8 p-4"style="background-color: rgba(0, 0, 0, 0.33);">
                            <div class="profile_block" style="background-color: {{ $user->profile->color }};">
                                <div class='d-flex'>
                                    <div><h3 class="nickname m-1">{{ $user->name }}</h3></div>
                                    @if($user->id != $real )
                                        <div class="follow-button d-flex">
                                            <follow-button user-id="{{ $user->id }}" follows="{{ $user->follows }}"></follow-button>

                                        </div>
                                    @endif
                                </div>
                                <div class='followers row'>
                                    <div class="col-4 p-1"><strong>{{ $user->posts->count() }}</strong>Posts</div>
                                    <div class="col-4 p-1" ><a class="aclass" href="/followers/{{ $user->id }}"><strong>{{ $user->profile->followers->count() }}</strong>Folowers</a></div>
                                    <div class="col-4 p-1"><a class="aclass" href="/followings/{{ $user->id }}"><strong>{{ $user->followings->count() }}</strong>Folowings </a></div>
                                </div>
                                <div class="description mt-1"> {{ $user->profile->description ?? ''}} </div>
                                <div class="text mt-1"  > {{ $user->profile->text ?? ''}} </div>
                                <div class="text mt-1"><a href="{{ $user->profile->URL }}">{{ $user->profile->url }}</a></div>
                            </div>
                        </div>
                        <div class="col-4 p-3" style="background-color: rgba(0, 0, 0, 0.33);">
                            <img src="{{ $user->profile->profileImage() }}" class="greatimage" alt="img1">
                        </div>
                    </div>
                    <div class="posts row" style="background-color: {{ $user->profile->color }};">
                        @can('update', $user->profile)
                                <div class="row" style="text-align: center; background-color: rgba(0, 0, 0, 0.10);">
                                    <div class="btn1 col-6"><a class="aclass2" href="/posts/create">Add new post</a></div>
                                    <div class="btn1 col-6"><a class="aclass2" href="/profile/{{ $user->id }}/edit">EDIT Profile</a></div>
                                </div>
                        @endcan
                        <div class=" w-100 " style="text-align: center; background-color: rgba(0, 0, 0, 0.10);"><hr><strong>Posts</strong><hr></div>
                        @foreach($user->posts as $post)
                            <div class="col-4 mt-1">
                                <a href="/p/{{ $post->id }}">
                                    <img src="/storage/{{ $post->image }}" class='w-100'>
                                </a>
                            </div>
                        @endforeach
                        @if($user->posts->count() == 0)
                            <div class="p-4">
                                <p style="text-align: center;">You can share your vibe with your friends, just add some posts!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
