@extends('layouts.admin')

@section('head')
    @vite(['resources/js/deleteForm.js'])
@endsection

@section('content')

<div class="container mt-4 admin-index">
    @if (session('success-message'))
        <div class="alert alert-{{ session('message_class') }} mb-3">
            {{ session('success-message') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col text-center">#id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Content</th>
            <th scope="col">Date</th>
            <th scope="col" class="col-3 text-center">
                <a class="btn btn-primary ms-auto" href="{{ route('admin.posts.create') }}">Create new product</a>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row" class="align-middle">{{ $post->id }}</th>
                <td class="align-middle text-nowrap">{{ $post->type->name ?? 'No type' }}</td>
                <td class="align-middle">{{ $post->title }}</td>
                <td class="align-middle">{{ $post->author }}</td>
                <td class="align-middle overflow-scroll">{{ $post->content }}</td>
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
