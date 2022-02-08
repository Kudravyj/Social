@extends('layouts.app')

@section('content')
<section class="Profil">
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Public</div>
                    <div class="card-body">
                        <form method="POST" action="/p" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="input p-5">
                                    <input id='caption'
                                    type="text"
                                    class="form-control{{ $errors->has('caption') ? ' is-invalid' : ''}}"
                                    name="caption"
                                    caption='caption'
                                    value="{{ old('caption') }}">
                                </div>
                                @if ($errors->has("caption"))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first("caption") }}</strong> 
                                    </span>
                                @endif
                                <div class="row p-5">
                                    <input type="file" class="form-control-file" id='image' name='image'>
                                </div>
                                @if ($errors->has("image"))
                                        <strong>{{ $errors->first("image") }}</strong> 
                                @endif
                                <div class="row">
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
