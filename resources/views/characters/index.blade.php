@extends('layouts.app')

@section('title', 'Characters')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1">
                        Genshin Impact collection
                    </p>
                    <h1 class="h2 mb-1">Character Archive</h1>
                    <p class="text-muted mb-0">Search, filter and sort the character records.</p>
                </div>

                @auth
                    <a
                        href="{{ route('characters.create') }}"
                        class="btn btn-primary"
                    >
                        + Add character
                    </a>
                @endauth
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="GET" action="{{ route('characters.index') }}" class="row g-2 align-items-end mb-4">
                <div class="col-md-4">
                    <label for="search" class="form-label">Search by name</label>
                    <input
                        type="text"
                        name="search"
                        id="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Search characters"
                    >
                </div>

                <div class="col-md-3">
                    <label for="element_id" class="form-label">Element</label>
                    <select name="element_id" id="element_id" class="form-select">
                        <option value="">All elements</option>
                        @foreach ($elements as $element)
                            <option
                                value="{{ $element->id }}"
                                @selected(request('element_id') == $element->id)
                            >
                                {{ $element->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="is_playable" class="form-label">Playable</label>
                    <select name="is_playable" id="is_playable" class="form-select">
                        <option value="">Any</option>
                        <option value="1" @selected(request('is_playable') === '1')>Yes</option>
                        <option value="0" @selected(request('is_playable') === '0')>No</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="sort" class="form-label">Sort by</label>
                    <select name="sort" id="sort" class="form-select">
                        <option value="name" @selected(request('sort', 'name') === 'name')>
                            Name
                        </option>
                        <option value="rarity" @selected(request('sort') === 'rarity')>
                            Rarity
                        </option>
                    </select>
                </div>

                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>

                <div class="col-12">
                    <a href="{{ route('characters.index') }}">Clear all filters</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Character Name</th>
                            <th>Element</th>
                            <th>Weapon</th>
                            <th>Rarity</th>
                            @auth
                                <th>Actions</th>
                            @endauth
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($characters as $character)
                            <tr>
                                <td>{{ $characters->firstItem() + $loop->index }}</td>
                                <td>{{ $character->id }}</td>
                                <td>
                                    <a href="{{ route('characters.show', $character) }}">
                                        {{ $character->name }}
                                    </a>
                                </td>
                                <td>{{ $character->element->name }}</td>
                                <td>{{ $character->weapon }}</td>
                                <td>
                                    @if ($character->rarity >= 5)
                                        <span class="badge text-bg-warning">5-Star Featured</span>
                                    @else
                                        <span class="badge text-bg-secondary">{{ $character->rarity }}-Star</span>
                                    @endif
                                </td>
                                @auth
                                    <td>
                                        <a
                                            class="btn btn-warning btn-sm"
                                            href="{{ route('characters.edit', $character) }}"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('characters.destroy', $character) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this character?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ Auth::check() ? 7 : 6 }}" class="text-center text-muted py-4">
                                    No characters match the selected question.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $characters->links() }}
        </div>
    </div>
@endsection