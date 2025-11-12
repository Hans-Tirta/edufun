@extends('layouts.master')
@section('title', $user->name)

@section('content')
    <div class="p-3 border rounded text-center mb-4">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle mb-3" width="100" height="100">
        <h1 class="h4 mb-1">{{ $user->name }}</h1>
        <small class="text-muted">Specialist: {{ $user->specialty ?? '—' }} | Total Articles: {{ $posts->count() }}</small>
    </div>

    @forelse($posts as $post)
        <div class="row mb-4 p-3 border rounded align-items-center">
            <div class="col-md-4 mb-2 mb-md-0">
                <img src="{{ $post->image ?? 'https://picsum.photos/seed/default/900/450' }}"
                    class="img-fluid rounded w-100" alt="{{ $post->title }}">
            </div>
            <div class="col-md-8">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small class="text-muted">
                    {{ $post->category->name }} | {{ $post->created_at->toFormattedDateString() }}
                </small>
                <p class="mt-2 mb-3">{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 180) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    @empty
        <div class="alert alert-secondary">Belum ada artikel oleh {{ $user->name }}.</div>
    @endforelse
@endsection
