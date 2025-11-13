@extends('layouts.master')
@section('title', $user->name)

@section('content')
    <div class="p-3 border rounded text-center mb-4">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle mb-3">
        <h1 class="h4">{{ $user->name }}</h1>
        <small class="text-muted">Specialist: {{ $user->specialty }} | Articles: {{ $posts->count() }}</small>
    </div>

    @forelse($posts as $post)
        @include('components.post-card')
    @empty
        <div class="alert alert-secondary">Belum ada artikel oleh {{ $user->name }}.</div>
    @endforelse
@endsection
