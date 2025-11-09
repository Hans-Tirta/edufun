<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    protected array $writers = [
        'budi' => [
            'name' => 'Budi',
            'specialty' => 'Interactive Multimedia',
            'avatar' => 'https://picsum.photos/seed/budi/200',
        ],
        'siti' => [
            'name' => 'Siti',
            'specialty' => 'Software Engineering',
            'avatar' => 'https://picsum.photos/seed/siti/200',
        ],
    ];

    public function index()
    {
        $writers = $this->writers;
        return view('writers.index', compact('writers'));
    }

    public function show(string $slug)
    {
        if (!isset($this->writers[$slug])) {
            abort(404);
        }

        $writer = $this->writers[$slug];

        $posts = Post::with('category')
            ->where('author', $writer['name'])
            ->latest('id')
            ->get();

        return view('writers.show', compact('writer', 'posts'));
    }
}
