<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="/" class="flex items-center hover:opacity-75 transition-opacity">
                    <svg width="26" height="36" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="transform hover:scale-105 transition-transform">
                        <path d="M0 50.5263C0 43.085 6.03237 37.0526 13.4737 37.0526V37.0526C20.915 37.0526 26.9474 43.085 26.9474 50.5263V50.5263C26.9474 57.9676 20.915 64 13.4737 64V64C6.03237 64 0 57.9676 0 50.5263V50.5263Z" fill="#1544EF"/>
                        <path d="M0 7.99999C0 3.58172 3.58172 0 8 0H18.9474C23.3657 0 26.9474 3.58172 26.9474 8V18.9474C26.9474 23.3657 23.3656 26.9474 18.9474 26.9474H7.99999C3.58172 26.9474 0 23.3656 0 18.9474V7.99999Z" fill="#1544EF"/>
                        <path d="M37.0526 45.0526C37.0526 40.6343 40.6344 37.0526 45.0526 37.0526H56C60.4183 37.0526 64 40.6344 64 45.0526V56C64 60.4183 60.4183 64 56 64H45.0526C40.6344 64 37.0526 60.4183 37.0526 56V45.0526Z" fill="#F4F4F4"/>
                        <path d="M37.0526 13.4737C37.0526 6.03237 43.085 0 50.5263 0V0C57.9676 0 64 6.03237 64 13.4737V13.4737C64 20.915 57.9676 26.9474 50.5263 26.9474V26.9474C43.085 26.9474 37.0526 20.915 37.0526 13.4737V13.4737Z" fill="#F4F4F4"/>
                    </svg>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:hidden lg:flex sm:items-center sm:ms-10 space-x-1">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('talks.index')" :active="request()->routeIs('talks.index')"
                              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                        {{ __('Talks') }}
                    </x-nav-link>

                    <x-nav-link :href="route('conferences.index')" :active="request()->routeIs('conferences.index')"
                              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        {{ __('Conferences') }}
                    </x-nav-link>

                    <x-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.index')"
                              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        {{ __('Favorites') }}
                    </x-nav-link>

                    <x-nav-link :href="route('fullcalender')" :active="request()->routeIs('fullcalender')"
                        class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="1" x2="16" y2="4"></line>
                            <line x1="8" y1="1" x2="8" y2="4"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <rect x="7" y="14" width="10" height="6"></rect>
                        </svg>
                        {{ __('My Calendar') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden lg:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 group">
                            <div class="flex items-center">
                                <!-- Avatar placeholder -->
                                <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center mr-2 group-hover:bg-indigo-600 transition-colors">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 transition-transform group-hover:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100 dark:border-gray-600">
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center text-red-600 dark:text-red-400 hover:text-red-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                 class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('talks.index')" :active="request()->routeIs('talks.index')"
                                 class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                </svg>
                {{ __('Talks') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('conferences.index')" :active="request()->routeIs('conferences.index')"
                class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                {{ __('Conferences') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.index')"
                            class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
                {{ __('Favorites') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.index')"
                class="flex items-center">
                <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="1" x2="16" y2="4"></line>
                    <line x1="8" y1="1" x2="8" y2="4"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                    <rect x="7" y="14" width="10" height="6"></rect>
                </svg>
                {{ __('My Calendar') }}
            </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 py-2 flex items-center">
            <!-- Avatar placeholder -->
            <div class="w-10 h-10 rounded-full bg-indigo-500 text-white flex items-center justify-center mr-3">
            {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            </div>

            <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                            this.closest('form').submit();"
                    class="flex items-center text-red-600 dark:text-red-400">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                {{ __('Log Out') }}
            </x-responsive-nav-link>
            </form>
            </div>
        </div>
    </div>
</nav>
