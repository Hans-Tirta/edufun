@extends('layouts.master')
@section('title', 'Writers')

@section('content')
    <h1 class="mb-4">Writers</h1>

    <div class="container">
        <div class="row g-4">
            @foreach ($writers as $slug => $w)
                <div class="col-md-6">
                    <a href="{{ route('writers.show', $slug) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 text-center border-0 shadow-sm p-4 transition hover-shadow">
                            <img src="{{ $w['avatar'] }}" alt="{{ $w['name'] }}" class="rounded-circle mx-auto mb-3"
                                width="120" height="120">
                            <h5 class="mb-1">{{ $w['name'] }}</h5>
                            <small class="text-muted d-block mb-3">
                                Specialist: {{ $w['specialty'] }}
                            </small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
