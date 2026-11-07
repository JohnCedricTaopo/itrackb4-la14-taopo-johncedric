@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <div class="card shadow-sm text-center">
        <div class="card-body py-5">
            <h1 class="display-4">Page not found</h1>

            <p class="lead">
                The character or page you requested does not exist.
            </p>

            <a
                class="btn btn-primary"
                href="{{ route('characters.index') }}"
            >
                Back to the character list
            </a>
        </div>
    </div>
@endsection