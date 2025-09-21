<?php

namespace App\Livewire;

use App\Models\Post;
use App\Data\PostData;
use Livewire\Component;
use App\Models\Category;

class Footer extends Component
{
    public function render()
    {
        $posts_popular = PostData::collect(
            Post::query()->where('status_post', 'popular')->latest()->take(3)->get()
        );
        $categories = Category::all();

        return view('livewire.footer', [
            'posts_popular' => $posts_popular,
            'categories' => $categories
        ]);
    }
}
