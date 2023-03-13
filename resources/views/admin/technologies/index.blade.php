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
            <th scope="col">#id</th>
            <th scope="col">Name</th>
            <th scope="col"># of posts</th>
            <th scope="col">Color</th>
            <th scope="col" class="col-3">
                <a class="btn btn-primary ms-auto" href="{{ route('admin.technologies.create') }}">Create new technology</a>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
            <tr style="background-color: {{ $technology->color }}">
                <th scope="row" class="align-middle">{{ $technology->id }}</th>
                <td class="align-middle">{{ $technology->name }}</td>
                <td class="align-middle">{{ count($technology->posts) }}</td>
                <td class="align-middle">{{ $technology->color }}</td>
                <td>
                    <div class="btn-container">
                        <a class="btn btn-primary m-1" href=" {{ route('admin.technologies.show', $technology->id) }} ">Show</a>
                        <a class="btn btn-warning m-1" href=" {{ route('admin.technologies.edit', $technology->id) }} ">Edit</a>
                        <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" class="form-deleter" data-element-name="{{ $technology->name }}">
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
        {{ $technologies->links() }}
    </div>
</div>
@endsection

@section('scripts')
    @vite('resources/js/deleteForm.js')
@endsection
