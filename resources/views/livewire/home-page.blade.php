<main class="w-full mx-auto px-8 py-12">
    <!-- Articles Trending Section -->
    <x-post-trending :posts="$posts_trending" />

    <section class="mb-12">
        <h2 class="sr-only">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts_latest as $post)
                <article class="bg-white rounded-lg overflow-hidden">
                    <figure>
                        <img class="w-full h-48 object-cover"
                            src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-latest.png') }}"
                            alt="{{ $post->title }}" />
                    </figure>
                    <div class="p-6">
                        <div class="text-sm mb-2">
                            <a href="{{ route('category.posts', $post->category_slug) }}"
                                class="font-bold text-black">{{ $post->category_name }}</a>
                            <span class="text-gray-500">— {{ $post->created_at }}</span>
                        </div>
                        <a href="{{ route('post.show', $post->slug) }}">
                            <h3 class="text-xl font-bold mb-3">
                                {{ $post->title }}
                            </h3>
                        </a>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($post->description, 100, '...') }}
                        </p>
                        <a href="{{ route('posts.byAuthor', $post->author_slug) }}"
                            class="flex items-center not-italic">
                            <img alt="Sergy Campbell, CEO and Founder" class="w-10 h-10 rounded-full mr-3"
                                src="{{ $post->author_avatar ?? asset('img/default-latest.png') }}"
                                alt="{{ $post->author_name }}" />
                            <div>
                                <p class="font-bold text-sm">{{ $post->author_name }}</p>
                                <p class="text-gray-500 text-xs">{{ $post->author_occupation }}</p>
                            </div>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Articles Popular Section -->
    <x-post-popular :posts="$posts_popular" />

    <livewire:banner-latest />

    <section class="w-full mx-auto mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <div>
                <h2 class="text-3xl font-bold mb-6">Riau</h2>
                <div class="space-y-6">
                    @foreach ($posts_riau as $post)
                        <article class="flex items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                            <img class="w-24 h-24 rounded-lg object-cover"
                                src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-post.png') }}"
                                alt="{{ $post->title }}" />
                            <div class="ml-4">
                                <div class="text-sm mb-2">
                                    <a href="{{ route('category.posts', $post->category_slug) }}"
                                        class="font-bold text-black">{{ $post->category_name }}</a>
                                    <span class="text-gray-500">— {{ $post->created_at }}</span>
                                </div>
                                <a href="{{ route('post.show', $post->slug) }}">
                                    <h3 class="text-lg font-bold mt-1">
                                        {{ $post->title }}
                                    </h3>
                                </a>
                                <a href="{{ route('posts.byAuthor', $post->author_slug) }}"
                                    class="flex items-center mt-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ $post->author_avatar ?? asset('img/default-user.png') }}"
                                        alt="{{ $post->author_name }}" />
                                    <div class="ml-3">
                                        <p class="font-semibold text-sm">{{ $post->author_name }}</p>
                                        <p class="text-xs text-gray-500">
                                            Author, {{ $post->author_post_count }} published post
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div>
                <h2 class="text-3xl font-bold mb-6">Hukum</h2>
                <div class="space-y-6">
                    @foreach ($posts_hukum as $post)
                        <article class="flex items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                            <img class="w-24 h-24 rounded-lg object-cover"
                                src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-post.png') }}"
                                alt="{{ $post->title }}" />
                            <div class="ml-4">
                                <div class="text-sm mb-2">
                                    <a href="{{ route('category.posts', $post->category_slug) }}"
                                        class="font-bold text-black">{{ $post->category_name }}</a>
                                    <span class="text-gray-500">— {{ $post->created_at }}</span>
                                </div>
                                <a href="{{ route('post.show', $post->slug) }}">
                                    <h3 class="text-lg font-bold mt-1">
                                        {{ $post->title }}
                                    </h3>
                                </a>
                                <a href="{{ route('posts.byAuthor', $post->author_slug) }}"
                                    class="flex items-center mt-3">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ $post->author_avatar ?? asset('img/default-user.png') }}"
                                        alt="{{ $post->author_name }}" />
                                    <div class="ml-3">
                                        <p class="font-semibold text-sm">{{ $post->author_name }}</p>
                                        <p class="text-xs text-gray-500">
                                            Author, {{ $post->author_post_count }} published post
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription Section -->
    <x-subscription />
</main>
