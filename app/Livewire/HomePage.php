<?php

namespace App\Livewire;

use App\Models\Post;
use App\Data\PostData;
use Livewire\Component;
use App\Models\Category;
use COM;

class HomePage extends Component
{
    public function render()
    {
        $posts_trending = PostData::collect(
            Post::query()->where('status_post', 'trending')->latest()->take(4)->get()
        );

        $posts_popular = PostData::collect(
            Post::query()->where('status_post', 'popular')->latest()->take(9)->get()
            // Post::query()->where('status_post', 'popular')->oldest()->take(9)->get()
        );

        $posts_latest = PostData::collect(
            Post::query()->latest()->take(6)->get()
        );

        $posts_riau = PostData::collect(
            Post::query()
                ->whereHas('category', fn($q) => $q->where('slug', 'riau')) // atau name
                ->latest()
                ->take(3)
                ->get()
        );

        $posts_hukum = PostData::collect(
            Post::query()
                ->whereHas('category', fn($q) => $q->where('slug', 'hukum'))
                ->latest()
                ->take(3)
                ->get()
        );

        return view('livewire.home-page', [
            'title' => 'Home',
            'posts_trending' => $posts_trending,
            'posts_popular' => $posts_popular,
            'posts_latest' => $posts_latest,
            'posts_riau' => $posts_riau,
            'posts_hukum' => $posts_hukum,
        ]);
    }
}
