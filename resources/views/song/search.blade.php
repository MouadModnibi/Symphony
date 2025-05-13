@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Songs</h2>

    <!-- Search form (optional here if not already in navbar) -->
    <form action="{{ route('songs.search') }}" method="GET" class="mb-4 d-flex">
        <input type="text" name="query" class="form-control me-2" placeholder="Search songs..." value="{{ request('query') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(count($songs) > 0)
        <div class="list-group">
            @foreach ($songs as $song)
                <a href="{{ route('songs.show', $song->id) }}" class="list-group-item list-group-item-action">
                    <strong>{{ $song->title }}</strong> <span class="text-muted">by {{ $song->artist }}</span>
                </a>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning">
