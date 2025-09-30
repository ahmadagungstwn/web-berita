<x-layouts.app title="Posts in {{ $category->name }}">
    <div class="container mx-auto px-4 py-16">
        {{-- Section heading --}}
        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">
            Category
        </p>
        <h1 class="text-4xl font-bold mt-2 mb-8">
            '{{ $category->name }}'
        </h1>

        {{-- List of posts --}}
        <div class="space-y-4">
            @forelse($posts as $post)
                <article class="flex flex-col md:flex-row items-start gap-4 p-4 rounded-lg ">
                    {{-- Cover image --}}
                    <figure class="md:w-1/4 w-full">
                        <img src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-trending.png') }}"
                            alt="{{ $post->title }}" class="rounded-md w-full h-auto object-cover aspect-[4/3]" />
                    </figure>

                    {{-- Post content --}}
                    <div class="md:w-3/4">
                        <p class="text-md text-gray-600">
                            <a href="{{ route('category.posts', $post->category_slug) }}"
                                class="font-medium text-gray-900">
                                {{ $post->category_name }}
                            </a>
                            —
                            <span>
                                {{ $post->created_at }}
                            </span>
                        </p>

                        <h2 class="text-2xl font-semibold mt-2 mb-2">
                            <a href="{{ route('post.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-lg text-gray-600 leading-snug">
                            {{ Str::limit(strip_tags(Str::markdown($post->description)), 500, '...') }}
                        </p>

                        {{-- Author --}}
                        <a href="{{ route('posts.byAuthor', $post->author_slug) }}" class="flex items-center mt-4">
                            <img src="{{ $post->author_avatar ?? asset('img/default-user.png') }}"
                                alt="{{ $post->author_name }}" class="w-10 h-10 rounded-full mr-3" />
                            <div>
                                <p class="text-md font-medium text-gray-900">
                                    {{ $post->author_name }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $post->author_occupation }}, {{ $post->author_post_count }} posts
                                </p>
                            </div>
                        </a>
                    </div>
                </article>

            @empty
                <p class="text-gray-500">No posts available in this Category.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12 bg-white">
            @if (method_exists($posts, 'links'))
                {{ $posts->links() }}
            @endif
        </div>
    </div>

    {{-- subscribe --}}
    <div class="mx-4 mb-16">
        <x-subscription />
    </div>
</x-layouts.app>
