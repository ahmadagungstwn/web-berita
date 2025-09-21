<x-layouts.app title="News Detail">
    <article class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl py-12">
        <header class="text-center">
            <figure>
                <img class="w-16 h-16 rounded-full mx-auto mb-4"
                    src="{{ $post->author_avatar ?? asset('img/default-user.png') }}" alt="{{ $post->author_name }}" />
                <figcaption>
                    <p class="text-sm font-semibold text-gray-900">{{ $post->author_name }}</p>
                    <time datetime="2020-07-02" class="text-xs text-gray-500">{{ $post->created_at }}</time>
                </figcaption>
            </figure>
        </header>

        <h1 class="text-4xl font-bold text-center mb-6 leading-tight">
            {{ $post->title }}
        </h1>
        <figure class="mb-12">
            <img class="w-full h-auto rounded-lg"
                src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-trending.png') }}"
                alt="{{ $post->title }}" />
        </figure>

        <section class="space-y-6 text-gray-700 leading-relaxed">
            <p>{!! Str::markdown($post->description) !!}
            </p>
        </section>

        <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 my-12" aria-label="Gallery of images">
            @foreach ($post->gallery as $key => $image)
                <figure class="col-span-1">
                    <img src="{{ $image }}" alt="image-{{ $key }}"
                        class="w-full h-full object-cover rounded-lg" />
                </figure>
            @endforeach
        </section>

        <section class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex items-center space-x-4" role="contentinfo" aria-label="Share this article">
                <span class="text-sm font-medium">Share</span>
                <a class="text-gray-900 hover:text-gray-800" href="#" aria-label="Share on Facebook">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 0C4.477 0 0 4.477 0 10c0 4.992 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.992 20 10c0-5.523-4.477-10-10-10z">
                        </path>
                    </svg>
                </a>
                <a class="text-gray-900 hover:text-gray-800" href="#" aria-label="Share on Twitter">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.635 8.635 0 01-2.358.646 4.138 4.138 0 001.805-2.27 8.225 8.225 0 01-2.606.996A4.129 4.129 0 0014.55 2c-2.278 0-4.125 1.846-4.125 4.125 0 .324.036.638.106.94A11.724 11.724 0 011.646 2.885a4.127 4.127 0 001.27 5.51-4.085 4.085 0 01-1.868-.514v.052a4.125 4.125 0 003.308 4.043 4.118 4.118 0 01-1.862.07A4.128 4.128 0 007.88 15.3a8.282 8.282 0 01-5.132 1.765 8.35 8.35 0 01-.986-.058 11.656 11.656 0 006.29 1.844">
                        </path>
                    </svg>
                </a>
                <a class="text-gray-900 hover:text-gray-800" href="#" aria-label="Share on LinkedIn">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd"
                            d="M10 0C4.477 0 0 4.477 0 10c0 4.477 2.926 8.256 6.94 9.574V12.8H4.873V10h2.067V7.89c0-2.053 1.22-3.188 3.106-3.188.894 0 1.83.165 1.83.165v2.33h-1.15c-1.012 0-1.33.606-1.33 1.275V10h2.6l-.417 2.8H9.394v6.774C13.074 18.256 16 14.477 16 10c0-3.313-2.687-6-6-6H6.94z"
                            fill-rule="evenodd"></path>
                    </svg>
                </a>
                <a class="text-gray-900 hover:text-gray-800" href="#" aria-label="More sharing options">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM5.5 8.5a1 1 0 11-2 0 1 1 0 012 0zM10 8.5a1 1 0 11-2 0 1 1 0 012 0zm5.5-1a1 1 0 100-2 1 1 0 000 2z">
                        </path>
                    </svg>
                </a>
            </div>
        </section>
    </article>


    <section class="max-w-7xl px-4 sm:px-6 lg:px-8 py-16 mx-12">
        <h2 class="text-4xl font-bold mb-8 text-gray-900 dark:text-white">Related</h2>
        @foreach ($posts_latest as $post)
            <div class="w-full mx-auto bg-white overflow-hidden flex mb-8">
                <!-- Gambar -->
                <div class="w-1/4">
                    <img src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-latest.png') }}"
                        alt="{{ $post->title }}" class="w-full h-56 object-cover rounded-lg">
                </div>

                <!-- Konten -->
                <div class="w-2/3 p-6 flex flex-col justify-between">
                    <div>
                        <div class="text-lg mb-2">
                            <span class="font-bold text-black">{{ $post->category_name }}</span>
                            <span class="text-gray-500">— {{ $post->created_at }}</span>
                        </div>
                        <a href="{{ route('post.show', $post->slug) }}">
                            <h2 class="text-2xl font-bold text-gray-900 mt-2">
                                {{ $post->title }}
                            </h2>
                        </a>
                        <p class="text-gray-600 mt-2">
                            {{ Str::limit($post->description, 100, '...') }}
                        </p>
                    </div>

                    <!-- Author -->
                    <div class="flex items-center mt-4">
                        <img class="w-10 h-10 rounded-full"
                            src="{{ $post->author_avatar ?? asset('img/default-latest.png') }}"
                            alt="{{ $post->author_name }}">
                        <div class="ml-3">
                            <p class="text-gray-900 font-semibold">{{ $post->author_name }}</p>
                            <p class="text-gray-500 text-sm">Author, {{ $post->author_post_count }} published post</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
</x-layouts.app>
