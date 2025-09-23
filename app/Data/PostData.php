<?php

namespace App\Data;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        public int $id,
        public string $category_name,
        public string $category_slug,
        public ?string $category_icon,
        public string $author_name,
        public string $author_slug,
        public string $author_occupation,
        public ?string $author_avatar,
        public int $author_post_count,
        public string $title,
        public string $slug,
        public string $is_featured,
        public string $description,
        public ?string $cover_url,
        public string $created_at,

        public ?array $gallery = [],

    ) {}

    public static function fromModel(Post $post, bool $with_gallery = false): self
    {
        return new self(
            id: $post->id,
            category_name: $post->category->name,
            category_slug: $post->category->slug,
            category_icon: $post->category->icon ? asset('storage/' . $post->category->icon) : null,
            author_name: $post->author->name,
            author_slug: $post->author->slug,
            author_occupation: $post->author->occupation,
            author_avatar: $post->author->avatar ? asset('storage/' . $post->author->avatar) : null,
            author_post_count: $post->author->posts()->count(),
            title: Str::limit($post->title, 50),
            slug: $post->slug,
            is_featured: $post->status_post,
            description: $post->description,
            cover_url: $post->getFirstMediaUrl('cover') ?: null,
            created_at: Carbon::parse($post->created_at)->translatedFormat('F j, Y'),
            gallery: $with_gallery
                ? $post->getMedia('gallery')->map(fn($record) => $record->getUrl())->toArray()
                : [],
        );
    }
}
