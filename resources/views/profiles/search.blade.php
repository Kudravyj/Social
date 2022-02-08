@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-5">
                        <div>
                            <form action="{{ url('/search') }}" class="form-inline my-2 my-lg-0 d-flex p-3" type="get">
                                <input class="form-control mr-sm-2" type="search" name='query' placeholder="Find user">
                                <button class="btn btn-outline-light my-2 m-3">search</button>
                            </form>
                        </div>
                        @foreach($find_users as $user)
                            <div class="row d-flex">
                                <div class="col-3 mt-1 ">
                                    <img src="{{ $user->profile->profileImage() }}" class="greatimage w-100" alt="img1">
                                </div>
                                <div class="col-6 d-flex">
                                    <div class="mt-5">
                                        <div><a href="/profile/{{ $user->id }}" class="nickname"><h3>{{ $user->username }}</h3></a></div>
                                    </div>
                                </div>  
                                <div class="col-3 d-flex"> 
                                    @if($user->id != $real)
                                        <div class="follow-button d-flex">
                                            <follow-button user-id="{{ $user->id }}" follows="{{ $user->follows }}"></follow-button>

                                        </div>
                                    @endif
                                </div>
                                <hr>
                            </div>
                        @endforeach
                        @if($find_users->count() == 0)
                            <div class="p-4">
                                <p style="text-align: center;">Oh no, it seems like we didn't find anything :(</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>
@endsection