@extends('layouts.master')
@section('title', $user->name)

@section('content')
    <div class="p-3 border rounded text-center mb-4">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle mb-3" width="100" height="100">
        <h1 class="h4 mb-1">{{ $user->name }}</h1>
        <small class="text-muted">Specialist: {{ $user->specialty ?? '—' }} | Total Articles: {{ $posts->count() }}</small>
    </div>

    @forelse($posts as $post)
        @include('components.post-card', ['post' => $post])
    @empty
        <div class="alert alert-secondary">Belum ada artikel oleh {{ $user->name }}.</div>
    @endforelse
@endsection
