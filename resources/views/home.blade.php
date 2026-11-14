@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center g-4">
                <div class="col-md-8">
                    <p class="text-uppercase text-primary fw-semibold small mb-2">
                        Welcome to the archive
                    </p>

                    <h1 class="display-5 fw-bold">
                        Explore Genshin Impact characters
                    </h1>

                    <p class="lead text-muted">
                        Browse character details, compare elements and discover the records in this archive.
                    </p>

                    <a
                        class="btn btn-primary btn-lg"
                        href="{{ route('characters.index') }}"
                    >
                        Browse characters
                    </a>
                </div>

                <div class="col-md-4 text-center">
                    <img
                        src="{{ asset('img/genshin-profile.jpg') }}"
                        width="160"
                        height="160"
                        class="rounded-circle img-fluid border border-4 border-light shadow"
                        alt="John Cedric Taopo"
                    >

                    <p class="mt-3 mb-0 fw-semibold">John Cedric P. Taopo</p>
                    <p class="text-muted mb-0">BSIT · 4th Year · Block 4C</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <h2 class="display-6 fw-bold text-primary">{{ $characterCount }}</h2>
                    <p class="mb-0">Characters in the archive</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <h2 class="display-6 fw-bold text-success">{{ $elementCount }}</h2>
                    <p class="mb-0">Elements represented</p>
                </div>
            </div>
        </div>
    </div>
@endsection