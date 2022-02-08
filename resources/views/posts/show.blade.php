@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card p-5">
                        <div>
                            <img src="/storage/{{ $post->image }}" class='w-100'>
                        </div>
                        <div>
                            @can('update', $post->user->profile)
                                <form method="POST" action="/p/{{ $post->id }}/delete">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection