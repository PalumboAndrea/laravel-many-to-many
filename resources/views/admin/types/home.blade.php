@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="posts-info">
                    <h3>
                        {{ $post->title }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

@endsection