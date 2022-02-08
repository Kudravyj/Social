@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-3">
                        <div>
                            <form action="{{ url('/search') }}" class="form-inline my-2 my-lg-0 d-flex p-3" type="get">
                                <input class="form-control mr-sm-2" type="search" name='query' placeholder="Find user">
                                <button class="btn btn-outline-light my-2 my-sm-0">search</button>
                            </form>
                        </div>
                    @foreach($posts as $post)
                        <div class="card p-3 pt-5">
                            <img src="/storage/{{ $post->image }}" class='w-100'>
                            
                            <div class="row d-flex">
                                <div class="col-3 mt-1">
                                    <img src="{{ $post->user->profile->profileImage() }}" class="greatimage w-100" alt="img1">
                                </div>
                                <div class="col-6 d-flex">
                                    <div class="row mt-3">
                                        <div><a href="/profile/{{ $post->user->id }}" class="nickname"><h3>{{ $post->user->username }}</h3></a></div>
                                        <div>
                                            {{ $post->Caption }}
                                        </div>
                                    </div>
                                    
                                </div>  
                                <div class="col-3 d-flex"> 
                                    <div class="follow-button mt-5">
                                        <follow-button user-id="{{ $post->user->id }}" follows="{{ $post->user->follows }}"></follow-button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
    </div>
@endsection