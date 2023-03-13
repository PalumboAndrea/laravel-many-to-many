@extends('layouts.admin')

@section('content')

    <div class="container my-4">
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @include('admin.technologies.partials.form', ['route' => 'admin.technologies.store', 'method' => 'POST', 'technology' => $technology])

@endsection