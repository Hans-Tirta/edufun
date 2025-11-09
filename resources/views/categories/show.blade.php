@extends('layouts.master')
@section('title', $category->name)

@section('content')
    <h1 class="mb-4">{{ $category->name }}</h1>

    @forelse($posts as $post)
        <div class="row mb-4 p-3 border rounded align-items-center">
            {{-- Gambar di kiri --}}
            <div class="col-md-4 mb-2 mb-md-0">
                @if ($post->image)
                    <img src="{{ $post->image }}" alt="cover {{ $post->title }}" class="img-fluid rounded w-100">
                @else
                    <img src="https://picsum.photos/seed/default/900/450" alt="default image" class="img-fluid rounded w-100">
                @endif
            </div>

            {{-- Teks di kanan --}}
            <div class="col-md-8">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <small class="text-muted">
                    {{ $post->category->name }} | by {{ $post->author }} | {{ $post->created_at->toFormattedDateString() }}
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
        <div class="alert alert-secondary">Belum ada artikel pada kategori ini.</div>
    @endforelse
@endsection
