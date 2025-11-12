<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latest = Post::with('category')
            ->latest('id')
            ->take(3)
            ->get();

        // return response()->json($latest);

        return view('home', compact('latest'));
    }
}
