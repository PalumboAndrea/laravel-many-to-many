@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h2 class="m-3 p-2 fw-bold text-center">
        Posts in {{  $technology->name }} technology
    </h2>

    @foreach ($technology->posts as $post)
    <div class="card text-center my-4">
        <div class="card-header">
            {{ $post->author }}
        </div>
        <div class="card-body p-3 m-3">
            <h2 class="card-title fw-bold p-3">
                {{ $post->title }}
            </h2>
            <p class="card-text mb-4">
                {{ $post->content }}
            </p>
            @dump($technology->id)

            <form action="{{ route('admin.posts.clearTechnology', [$post, $technology->id]) }}" method="POST" class="d-inline-block form-deleter" data-element-name='"{{ $post->title }}"'>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger">
                    Remove post from {{ $technology->name }} technology
                </button>
            </form>
        </div>

        <div class="card-footer text-muted">
            {{ $post->post_date }}
        </div>

    </div>
    @endforeach
</div>
@endsection