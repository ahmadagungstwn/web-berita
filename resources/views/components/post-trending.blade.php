<div id="default-carousel" class="relative w-full mb-12" data-carousel="slide">
    <h2 class="text-4xl font-bold text-center mb-12">Trending</h2>

    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96 mb-12">
        @foreach ($posts as $post)
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <article class="flex-shrink-0 w-full md:w-3/4 mx-auto bg-white rounded-lg overflow-hidden mb-8">
                    <div class="flex flex-col md:flex-row">
                        <figure class="md:w-1/2">
                            <img class="w-full h-full object-cover"
                                src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-trending.png') }}"
                                alt="{{ $post->title }}" />
                        </figure>
                        <div class="md:w-1/2 p-8 flex flex-col justify-center">
                            <div class="text-lg mb-2">
                                <a href="{{ route('category.posts', $post->category_slug) }}"
                                    class="font-bold text-black">{{ $post->category_name }}</a>
                                <span class="text-gray-500">— {{ $post->created_at }}</span>
                            </div>
                            <a href="{{ route('post.show', $post->slug) }}">
                                <h3 class="text-3xl font-bold mb-4">
                                    {{ $post->title }}
                                </h3>
                            </a>
                            <p class="text-gray-600 mb-6">
                                {{ Str::limit($post->description, 100, '...') }}
                            </p>
                            <a href="{{ route('posts.byAuthor', $post->author_slug) }}"
                                class="flex items-center not-italic">
                                <img class="w-10 h-10 rounded-full mr-4"
                                    src="{{ $post->author_avatar ?? asset('img/default-user.png') }}"
                                    alt="{{ $post->author_name }}" />
                                <div>
                                    <p class="font-bold">{{ $post->author_name }}</p>
                                    <p class="text-gray-500 text-sm">{{ $post->author_occupation }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="flex justify-center mt-4 space-x-3">
        @foreach ($posts as $index => $post)
            <button type="button" class="w-2 h-2 rounded-full !bg-green-300 aria-[current=true]:!bg-green-500"
                aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                data-carousel-slide-to="{{ $index }}">
            </button>
        @endforeach
    </div>
</div>
