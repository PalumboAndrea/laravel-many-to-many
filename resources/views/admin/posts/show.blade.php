@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card m-auto w-75 text-center">
        <div class="card-header fw-bold">
            {{ $post->author }} --- <span style="color: {{ $post->type->color }}">{{ $post->type->name }}</span>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center"> {{ $post->title }} </h5>
            <div class="card-image mb-5">
                @if ( $post->isImageAUrl())
                    <img src="{{ $post->image_path }}"
                @else
                    <img src="{{ asset('storage/' . $post->image_path ) }}"
                @endif
                    alt="{{ $post->title }} image" class="img-fluid">
            </div>
            <p class="card-text text-center"> {{ $post->author }} </p>
            <p class="card-text text-center"> {{ $post->content }} </p>
            <p class="card-text text-center"> {{ $post->post_date }} </p>
            <p class="card-text"></p>
        </div>
    </div>
</div>
@endsection
 