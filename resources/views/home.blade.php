@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <img src="https://picsum.photos/seed/news-hero/1200/400" alt="Hero" class="img-fluid rounded mb-4">

    <h1 class="mb-4">Latest Posts</h1>

    @forelse($latest as $post)
        @include('components.post-card')
    @empty
        <div class="alert alert-secondary">Belum ada artikel.</div>
    @endforelse
@endsection
