<header x-data="{ open: false }"
    class="w-full mx-auto px-6 py-6 flex justify-between items-center border-b border-gray-200">

    {{-- search-modal --}}
    <livewire:search-modal />

    <!-- Logo -->
    <h1 class="text-2xl font-bold">BERITATERKINI</h1>

    <!-- Social (desktop) -->
    <nav aria-label="Social media links">
        <ul class="flex items-center space-x-4">
            <li>
                <a class="text-gray-900 hover:text-black" href="#" aria-label="Twitter">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.48 2.96,10.28 2.38,9.95C2.38,9.97 2.38,9.98 2.38,10C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16.03 6.02,17.25 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.8C20.33,8.62 20.33,8.45 20.32,8.27C21.17,7.63 21.88,6.87 22.46,6Z">
                        </path>
                    </svg>
                </a>
            </li>
            <li>
                <a class="text-gray-900 hover:text-black" href="#" aria-label="GitHub">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path clip-rule="evenodd"
                            d="M12.02,2.5C6.75,2.5 2.5,6.75 2.5,12.02C2.5,16.43 5.43,20.13 9.48,21.5C10.1,21.6 10.32,21.23 10.32,20.91C10.32,20.63 10.31,19.89 10.3,18.96C7.3,19.58 6.41,17.41 6.41,17.41C5.86,16.03 4.81,15.53 4.81,15.53C3.72,14.79 4.89,14.8 4.89,14.8C6.08,14.88 6.81,15.93 6.81,15.93C7.88,17.72 9.61,17.18 10.3,16.85C10.4,16.19 10.68,15.73 10.97,15.48C8.17,15.17 5.22,14.07 5.22,9.82C5.22,8.68 5.61,7.73 6.27,7C6.18,6.74 5.83,5.74 6.36,4.28C6.36,4.28 7.39,3.95 10.28,5.82C11.26,5.54 12.3,5.4 13.34,5.4C14.38,5.4 15.42,5.54 16.4,5.82C19.29,3.95 20.32,4.28 20.32,4.28C20.85,5.74 20.5,6.74 20.41,7C21.07,7.73 21.46,8.68 21.46,9.82C21.46,14.08 18.51,15.17 15.71,15.48C16.08,15.79 16.38,16.42 16.38,17.41C16.38,18.83 16.37,20.01 16.37,20.36C16.37,20.69 16.58,21.08 17.2,20.95C20.59,19.95 23.5,16.5 23.5,12.02C23.5,6.75 19.25,2.5 12.02,2.5Z"
                            fill-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            <li>
                <a class="text-gray-900 hover:text-black" href="#" aria-label="LinkedIn">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path clip-rule="evenodd"
                            d="M12,2.5C6.74,2.5 2.5,6.74 2.5,12S6.74,21.5 12,21.5 21.5,17.26 21.5,12 17.26,2.5 12,2.5ZM8.5,18.5H6.5V10.5H8.5V18.5ZM7.5,9.5C6.67,9.5 6,8.83 6,8S6.67,6.5 7.5,6.5 9,7.17 9,8 8.33,9.5 7.5,9.5ZM18.5,18.5H16.5V13.88C16.5,12.75 16.1,12 15.08,12C14.04,12 13.5,12.63 13.5,13.88V18.5H11.5V10.5H13.5V11.5C13.83,10.89 14.5,10.3 15.75,10.3C17.43,10.3 18.5,11.38 18.5,13.5V18.5Z"
                            fill-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Hamburger -->
    <button @click="open = true" class="text-gray-600 focus:outline-none" aria-label="Open menu">
        <span class="material-icons" aria-hidden="true">menu</span>
    </button>

    <!-- Slider -->
    <div x-show="open" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="translate-x-full opacity-0"
        class="fixed inset-0 z-50 bg-gray-100 dark:bg-gray-900 flex flex-col p-6 md:w-1/3 md:ml-auto
               overflow-y-auto">

        <!-- Close Button -->
        <button @click="open = false" class="self-end mb-6 text-gray-600">
            <span class="material-icons">close</span>
        </button>

        <!-- Nav Links -->
        <nav class="flex-1">
            <ul class="space-y-4 text-lg">
                <li>
                    <a href="{{ route('home') }}"
                        class="block hover:text-green-600
              {{ request()->routeIs('home') ? 'text-green-600 font-semibold' : 'text-gray-800 dark:text-white' }}">
                        Home
                    </a>
                </li>

                <!-- Dropdown Category -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center text-gray-800 dark:text-white hover:text-green-600">
                        Categories
                        <span class="material-icons">expand_more</span>
                    </button>

                    <ul x-show="open" x-transition
                        class="ml-4 mt-2 space-y-2 bg-white dark:bg-gray-800 rounded shadow">
                        @foreach (App\Models\Category::all() as $category)
                            <li>
                                <a href="{{ route('category.posts', $category->slug) }}"
                                    class="block px-3 py-2 text-gray-600 dark:text-gray-200 hover:text-green-500">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Dropdown Arsip -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center text-gray-800 dark:text-white hover:text-green-600">
                        Arsip
                        <span class="material-icons">expand_more</span>
                    </button>
                    <ul x-show="open" x-transition class="ml-4 mt-2 space-y-2">
                        @foreach ($archives as $archive)
                            <li>
                                <a href="{{ route('posts.byMonth', ['year' => $archive['year'], 'month' => $archive['month']]) }}"
                                    class="block text-gray-600 hover:text-green-500">
                                    {{ $archive['month_name'] }} {{ $archive['year'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</header>
