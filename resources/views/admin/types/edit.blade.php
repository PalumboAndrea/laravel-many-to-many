@extends('layouts.admin')

@section('content')

    <div class="container my-4">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-10">
                <h1 class="m-0">
                    Modifica l'elemento
                </h1>
            </div>
            @include('admin.types.partials.backHome')
        </div>
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

    @include('admin.types.partials.form', ['route' => 'admin.types.update', 'method' => 'PUT', 'type' => $type])

@endsection