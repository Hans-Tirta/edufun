@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="mb-4">
        <img src="https://picsum.photos/seed/news-hero/1200/400" alt="Hero" class="img-fluid rounded w-100">
    </div>

    <h1 class="mb-4">Latest Posts</h1>

    @forelse($latest as $post)
        @include('components.post-card', ['post' => $post])
    @empty
        <div class="alert alert-secondary">Belum ada artikel.</div>
    @endforelse
@endsection
