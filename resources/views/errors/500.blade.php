@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
    <div class="card shadow-sm text-center">
        <div class="card-body py-5">
            <h1 class="display-4">Something went wrong</h1>

            <p class="lead">
                The character archive is temporarily unable to complete this request.
                Please try again later.
            </p>

            <a
                class="btn btn-primary"
                href="{{ route('characters.index') }}"
            >
                Return to the character list
            </a>
        </div>
    </div>
@endsection