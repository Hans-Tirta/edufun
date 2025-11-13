<div class="row mb-4 p-3 border rounded align-items-center">
    <div class="col-md-4">
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid rounded">
    </div>
    <div class="col-md-8">
        <h5>{{ $post->title }}</h5>
        <small class="text-muted">
            {{ $post->category->name }} | by {{ $post->user->name }} | {{ $post->created_at->toFormattedDateString() }}
        </small>
        <p class="mt-2">{{ Str::limit(strip_tags($post->body), 180) }}</p>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
    </div>
</div>
