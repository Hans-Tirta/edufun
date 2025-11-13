@extends('layouts.master')
@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">
        {{ $post->category->name }} | by {{ $post->user->name }} | {{ $post->created_at->toFormattedDateString() }}
    </p>

    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid rounded mb-3">

    <hr>
    <article class="fs-6">{{ $post->body }}</article>
@endsection
