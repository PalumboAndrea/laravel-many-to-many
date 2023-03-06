@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4 text-center">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card text-center">
                <div class="card-header mb-3">
                        <p class="m-0">
                            Status: {{ Auth::user()->userDetail->status }}
                        </p>
                    </div>
                    <div class="card-title">
                        <h4>
                            {{ Auth::user()->name }}
                        </h4>
                    </div>
                    <div class="card-image">
                        <img src="{{ Auth::user()->userDetail->profile_image }}" alt="" class="img-thumbnail w-25 d-inline-block">
                    </div>
                    <div class="card-body">
                        <h6>
                            email address : {{ Auth::user()->email }}
                        </h6>
                    </div>
                    <div class="card-footer">
                        <h6>
                            Bio:
                        </h6>
                        <p class=" fst-italic">
                            {{ Auth::user()->userDetail->bio }}
                        </p>

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
