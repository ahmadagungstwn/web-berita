<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Data\PostData;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post  = PostData::fromModel($post, true);

        $posts_latest = PostData::collect(
            Post::query()->where('status_post', 'none')->inRandomOrder()->take(3)->get()
        );

        return view('posts.show', compact('post', 'posts_latest'));
    }

    public function byCategory(Category $category)
    {
        // ambil posts via PostData
        $posts = $category->posts()
            ->latest()
            ->paginate(3);

        // transform ke PostData agar pagination tetap jalan
        $posts->getCollection()->transform(fn($post) => PostData::fromModel($post));

        return view('posts.by-category', compact('category', 'posts'));
    }


    public function byMonth($year, $month)
    {
        $month = (int) $month;

        $posts = Post::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->latest()
            ->paginate(3);

        $posts = PostData::collect($posts);

        $monthName = Carbon::create()->month($month)->translatedFormat('F');

        return view('posts.archive', [
            'posts' => $posts,
            'year' => $year,
            'month' => $month,
            'monthName' => $monthName,
        ]);
    }

    public function byAuthor(Author $author)
    {
        $posts = $author->posts()
            ->latest()
            ->paginate(3);

        $posts->getCollection()->transform(fn($post) => PostData::fromModel($post));

        return view('posts.by-author', [
            'author' => $author,
            'posts' => $posts,
        ]);
    }
}
