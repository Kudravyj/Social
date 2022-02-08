@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-5">
                        <div>
                            <form action="{{ url('/search') }}" class="form-inline my-2 my-lg-0 d-flex p-3" type="get">
                                <input class="form-control mr-sm-2" type="search" name='query' placeholder="Find user">
                                <button class="btn btn-outline-light my-2 my-sm-0">search</button>
                            </form>
                        </div>
                        @foreach($followings as $user)
                            <div class="row d-flex">
                                <div class="col-3 mt-1 ">
                                    <img src="{{ $user->user->profile->profileImage() }}" class="greatimage w-100" alt="img1">
                                </div>
                                <div class="col-6 d-flex">
                                    <div class="mt-5">
                                        <div class="p-4"><a href="/profile/{{ $user->id }}" class="nickname"><h3>{{ $user->user->name }}</h3></a></div>
                                    </div>
                                </div>  
                                <div class="col-3 d-flex"> 
                                    @if($user->id != $real->id)
                                        <div class="follow-button d-flex">
                                            <follow-button user-id="{{ $user->id }}" follows="{{ $user->follows }}"></follow-button>

                                        </div>
                                    @endif
                                </div>
                                <hr>
                            </div>
                            
                        @endforeach
                        <div>
                            <p>You can find friends there!</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection