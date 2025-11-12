<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    // List all users who have at least one post
    public function index()
    {
        // Grab users who have posts + count them
        $writers = User::has('posts')
            ->withCount('posts')
            ->get();

        return view('writers.index', compact('writers'));
    }

    // Show a writer profile and their posts
    public function show(User $user)
    {
        // Eager-load category to avoid N+1
        $posts = $user->posts()->with('category')->latest('id')->get();

        return view('writers.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
