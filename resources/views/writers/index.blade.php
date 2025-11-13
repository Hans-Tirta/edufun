@extends('layouts.master')
@section('title', 'Writers')

@section('content')
    <h1 class="mb-4">Writers</h1>

    <div class="row g-4">
        @foreach ($writers as $writer)
            <div class="col-md-6">
                <a href="{{ route('writers.show', $writer->id) }}" class="text-decoration-none text-dark">
                    <div class="card text-center border-0 shadow-sm p-4">
                        <img src="{{ $writer->avatar }}" alt="{{ $writer->name }}" class="rounded-circle mx-auto mb-3">
                        <h5>{{ $writer->name }}</h5>
                        <small class="text-muted d-block mb-3">
                            Specialist: {{ $writer->specialty }} | Articles: {{ $writer->posts_count }}
                        </small>
                        <span class="btn btn-sm btn-primary">View Posts</span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
