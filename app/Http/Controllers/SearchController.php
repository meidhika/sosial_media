<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Pencarian di tabel posts berdasarkan tag
        $posts = Post::where('tag', 'LIKE', '%' . $query . '%')->get();

        // Pencarian di tabel comments berdasarkan hashtag
        $comments = Comment::where('hashtag', 'LIKE', '%' . $query . '%')->get();

        // Mengirim hasil ke view
        return view('search.results', compact('posts', 'comments'));
    }
}
