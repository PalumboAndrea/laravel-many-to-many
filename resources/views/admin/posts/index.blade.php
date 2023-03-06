@extends('layouts.admin')

@section('content')

<div class="container mt-4 admin-index">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Content</th>
            <th scope="col">Date</th>
            <th scope="col" class="col-3">
                <a class="btn btn-primary ms-auto" href="{{ route('admin.posts.create') }}">Create new product</a>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row" class="align-middle">{{ $post->id }}</th>
                <td class="align-middle">{{ $post->type->name ?? 'No type' }}</td>
                <td class="align-middle">{{ $post->title }}</td>
                <td class="align-middle">{{ $post->author }}</td>
                <td class="align-middle">{{ $post->content }}</td>
                <td class="align-middle">{{ $post->post_date }}</td>
                <td class="align-middle">
                    <a class="btn btn-primary m-1" href=" {{ route('admin.posts.show', $post->id) }} ">Show</a>
                    <a class="btn btn-warning m-1" href=" {{ route('admin.posts.edit', $post->id) }} ">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="form-deleter" data-element-name="{{ $post->title }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-1">
                            Delete
                        </button>
                    </form>
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
