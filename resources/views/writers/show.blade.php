@extends('layouts.master')
@section('title', $writer['name'])

@section('content')
    <div class="d-flex align-items-center mb-4">
        <img src="{{ $writer['avatar'] }}" alt="{{ $writer['name'] }}" class="rounded-circle me-3" width="80" height="80">
        <div>
            <h1 class="h4 mb-1">{{ $writer['name'] }}</h1>
            <small class="text-muted">Specialist: {{ $writer['specialty'] }}</small>
        </div>
    </div>

    @forelse($posts as $post)
        <div class="row mb-4 p-3 border rounded align-items-center">
            <div class="col-md-4 mb-2 mb-md-0">
                <img src="{{ $post->image ?: 'https://picsum.photos/seed/default/900/450' }}"
                    alt="cover {{ $post->title }}" class="img-fluid rounded w-100">
            </div>
            <div class="col-md-8">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small class="text-muted">
                    {{ $post->category->name }} | by {{ $post->author }} | {{ $post->created_at->toFormattedDateString() }}
                </small>
                <p class="mt-2 mb-3">{{ Str::limit(strip_tags($post->body), 180) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    @empty
        <div class="alert alert-secondary">Belum ada artikel oleh {{ $writer['name'] }}.</div>
    @endforelse
@endsection
