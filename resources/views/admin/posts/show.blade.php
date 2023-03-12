@extends('layouts.admin')

@section('content')
<div class="container mt-4 mb-5">
    <div class="card m-auto w-75 text-center">
        <div class="card-header fw-bold">
            {{ $post->author }} --- <span style="color: {{ $post->type->color }}">{{ ucfirst(trans($post->type->name)) }}</span>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center m-0"> {{ $post->title }} </h5>
            <div class="my-3">
                @foreach ($post->technologies as $tech)
                    <span class="badge rounded-pill py-2 px-3" style="background-color:{{$tech->color}}">{{$tech->name}}</span>
                @endforeach
            </div>
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
 