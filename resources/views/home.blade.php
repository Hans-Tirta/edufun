@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="mb-4">
        <img src="https://picsum.photos/seed/news-hero/1200/400" alt="Hero" class="img-fluid rounded w-100">
    </div>

    <h2 class="mb-3">Latest Posts</h2>

    @forelse($latest as $post)
        <div class="row mb-4 p-3 border rounded align-items-center">
            {{-- image left --}}
            <div class="col-md-4 mb-2 mb-md-0">
                <img src="{{ $post->image ?: 'https://picsum.photos/seed/default/900/450' }}" alt="cover {{ $post->title }}"
                    class="img-fluid rounded w-100">
            </div>

            {{-- text right --}}
            <div class="col-md-8">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small class="text-muted">
                    {{ $post->category->name }} | by {{ $post->user->name }} |
                    {{ $post->created_at->toFormattedDateString() }}
                </small>
                <p class="mt-2 mb-3">
                    {{ Str::limit(strip_tags($post->body), 180) }}
                </p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">
                    Read More
                </a>
            </div>
        </div>
    @empty
        <div class="alert alert-secondary">Belum ada artikel.</div>
    @endforelse
@endsection
