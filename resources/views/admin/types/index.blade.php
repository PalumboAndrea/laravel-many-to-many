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
                <a class="btn btn-primary ms-auto" href="{{ route('admin.types.create') }}">Create new type</a>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr style="background-color: {{ $type->color }}">
                <th scope="row" class="align-middle">{{ $type->id }}</th>
                <td class="align-middle">{{ $type->name }}</td>
                <td class="align-middle">{{ count($type->posts) }}</td>
                <td class="align-middle">{{ $type->color }}</td>
                <td>
                    <div class="btn-container">
                        <a class="btn btn-primary m-1" href=" {{ route('admin.types.show', $type->id) }} ">Show</a>
                        <a class="btn btn-warning m-1" href=" {{ route('admin.types.edit', $type->id) }} ">Edit</a>
                        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="form-deleter" data-element-name="{{ $type->name }}">
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
        {{ $types->links() }}
    </div>
</div>
@endsection

@section('scripts')
    @vite('resources/js/deleteForm.js')
@endsection
