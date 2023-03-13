@extends('layouts.admin')

@section('head')
    @vite(['resources/js/deleteForm.js'])
@endsection

@section('content')

<div class="container mt-4 admin-index text-center">
    @include('layouts.includes.confirmMessage')
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col text-center">#id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Content</th>
            <th scope="col">Technologies</th>
            <th scope="col">Date</th>
            <th scope="col" class="col-3 text-center">
                <a class="btn btn-primary ms-auto" href="{{ route('admin.posts.create') }}">Create new post</a>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row" class="align-middle">{{ $post->id }}</th>
                
                <td class="align-middle text-nowrap">
                    <span style="color: {{ $post->type->color }}">{{ ucfirst(trans($post->type->name)) ?? 'No type' }}</span>
                </td>
                <td class="align-middle">{{ $post->title }}</td>
                <td class="align-middle">{{ $post->author }}</td>
                <td class="align-middle overflow-scroll">{{ $post->content }}</td>
                <td class="align-middle">
                    @forelse ($post->technologies as $tech)
                        @if ($loop->index != (count($post->technologies)-1))
                        <span class="badge rounded-pill py-2 px-2 my-1" style="background-color:{{$tech->color}}">{{$tech->name}}</span>
                        @else
                        <span class="badge rounded-pill py-2 px-2 my-1" style="background-color:{{$tech->color}}">{{$tech->name}}</span>
                        @endif
                    @empty
                        No technologies
                    @endforelse
                </td>
                <td class="align-middle text-nowrap">{{ $post->post_date }}</td>
                <td class="align-middle text-center">
                    <div class="btn-container">
                        <a class="btn btn-primary m-1" href=" {{ route('admin.posts.show', $post->id) }} ">Show</a>
                        <a class="btn btn-warning m-1" href=" {{ route('admin.posts.edit', $post->id) }} ">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="form-deleter" data-element-name="{{ $post->title }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-1">
                                Delete
                            </button>
                        </form>
                    </div>
                    
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <div>
        {{ $posts->links() }}
    </div>
</div>
@endsection

@section('scripts')
    @vite('resources/js/deleteForm.js')
@endsection
