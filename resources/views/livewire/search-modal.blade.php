<div>
    <!-- Button untuk buka modal (mirip search bar) -->
    <button wire:click="openModal" class="w-full max-w-md mx-auto">
        <div
            class="flex items-center justify-between border border-gray-300 rounded-lg shadow-sm pl-2 pr-1 md:pr-24 py-2 md:py-3 cursor-pointer hover:ring-1 hover:ring-green-500 transition">

            <div class="flex items-center space-x-2">
                <!-- Icon search -->
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"></path>
                </svg>
                <!-- Text hanya muncul di md+ -->
                <span class="text-gray-400 hidden md:inline">Search News...</span>
            </div>
        </div>
    </button>


    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-data
            x-init="$nextTick(() => $refs.searchInput.focus())">
            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-2xl p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Search Post</h2>
                    <button wire:click="closeModal"
                        class="text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
                </div>

                <!-- Form Search -->
                <form wire:submit.prevent="searchSubmit" class="w-full mb-4">
                    <div class="relative">
                        <input type="search" id="searchInput" x-ref="searchInput" placeholder="Search News..."
                            class="block w-full p-4 ps-10 pr-32 text-sm border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            wire:model.live.debounce.300ms="query" />
                        <button type="submit"
                            class="absolute end-2.5 bottom-2.5 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg text-sm px-4 py-2">
                            Search
                        </button>
                    </div>
                </form>

                <!-- Hasil Search Live -->
                @if ($query && $results->count() > 0)
                    <ul class="max-h-80 overflow-y-auto border rounded-md">
                        @foreach ($results as $post)
                            <li>
                                <a href="{{ route('post.show', $post->slug) }}"
                                    class="flex items-center bg-gray-50 p-2.5 rounded-lg shadow-sm m-2 border">
                                    <img class="w-16 h-16 rounded-lg object-cover"
                                        src="{{ !empty($post->cover_url) ? $post->cover_url : asset('img/default-post.png') }}"
                                        alt="{{ $post->title }}" />
                                    <div class="ml-3">
                                        <div class="text-xs mb-1.5">
                                            <span class="font-bold text-black">{{ $post->category_name }}</span>
                                            <span class="text-gray-500">— {{ $post->created_at }}</span>
                                        </div>
                                        <h3 class="text-base font-bold mt-1">
                                            {{ $post->title }}
                                        </h3>
                                        <div class="flex items-center mt-2">
                                            <img class="w-5 h-5 rounded-full"
                                                src="{{ $post->author_avatar ?? asset('img/default-user.png') }}"
                                                alt="{{ $post->author_name }}" />
                                            <div class="ml-2">
                                                <p class="font-semibold text-sm">{{ $post->author_name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    Author, {{ $post->author_post_count }} published post
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @elseif($query)
                    <p class="text-gray-500 dark:text-gray-400 mt-2">No results found.</p>
                @endif
            </div>
        </div>
    @endif
</div>
