@extends('layouts.master')
@section('title', $category->name)

@section('content')
    <h1 class="mb-4">{{ $category->name }}</h1>

    @forelse($posts as $post)
        @include('components.post-card')
    @empty
        <div class="alert alert-secondary">Belum ada artikel pada kategori ini.</div>
    @endforelse
@endsection
