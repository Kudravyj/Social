@extends('layouts.app')

@section('content')
<section class="Profil">
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                <div class="card-header">Public</div>
                    <div class="card-body">
                        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PATCH')
                                
                                <p>description</p>
                                <div class="input p-4 w-70">
                                    <input id='description'
                                    type="text"
                                    class="form-control{{ $errors->has('description') ? ' is-invalid' : ''}}"
                                    name="description"
                                    value="{{ old('description') ?? $user->profile->description }}">
                                </div>
                                @if ($errors->has("caption"))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first("caption") }}</strong> 
                                    </span>
                                @endif
                                <p>Caption</p>
                                <div class="input p-4 w-70">
                                    <input id='text'
                                    type="text"
                                    class="form-control{{ $errors->has('text') ? ' is-invalid' : ''}}"
                                    name="text"
                                    caption='text'
                                    value="{{ old('text') ?? $user->profile->text}}">
                                </div>
                                @if ($errors->has("caption"))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first("caption") }}</strong> 
                                    </span>
                                @endif
                                <p>Your url</p>
                                <div class="input p-4 w-70">
                                    <input id='URl'
                                    type="text"
                                    class="form-control{{ $errors->has('url') ? ' is-invalid' : ''}}"
                                    name="url"
                                    caption='url'
                                    value="{{ old('URl') ?? $user->profile->url }}">
                                </div>
                                @if ($errors->has("caption"))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first("caption") }}</strong> 
                                    </span>
                                @endif
                                <p>Image of profile</p>
                                <div class="row p-4">
                                    <input type="file" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : ''}}" id='image' name='image'>
                                </div>
                                @if ($errors->has("image"))
                                        <strong>{{ $errors->first("image") }}</strong> 
                                @endif
                                <p>Choose profile color</p>
                                <div class="p-4">
                                    <input type="color" 
                                    class="form-control-file {{ $errors->has('image') ? ' is-invalid' : ''}}" 
                                    id="color" 
                                    name='color' 
                                    value="{{ old('color') ?? $user->profile->color }}">
                                </div>
                                <p>Background image</p>
                                <div class="row p-4">
                                    <input type="file" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : ''}}" id='bg_image' name='bg_image'>
                                </div>
                                @if ($errors->has("image"))
                                        <strong>{{ $errors->first("image") }}</strong> 
                                @endif
                                <div class="row p-4 w-70">
                                    <button class="btn btn-primary">Post</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
