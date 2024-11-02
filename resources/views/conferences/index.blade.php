<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Conferences') }}
            </h2>
            <div class="flex space-x-4">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text"
                           placeholder="Search conferences..."
                           class="w-64 px-4 py-2 pr-8 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500">
                    <svg class="absolute right-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Check Updates Button -->
                <button onclick="checkForUpdates()"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Check for Updates
                </button>
            </div>
        </div>
    </x-slot>

    <div x-data="{
        filter: 'all',
        conferences: {{ Js::from($conferences) }},
        filteredConferences() {
            return this.conferences.filter(conf => {
                if (this.filter === 'all') return true;
                if (this.filter === 'favorites') return conf.is_favorited;
                return true;
            });
        }
    }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filters Section -->
            <div class="mb-6 flex flex-wrap gap-2">
                <button @click="filter = 'all'"
                        :class="{'bg-indigo-100 dark:bg-indigo-900': filter === 'all', 'bg-gray-100 dark:bg-gray-700': filter !== 'all'}"
                        class="px-4 py-2 rounded-full text-white text-sm font-medium hover:bg-indigo-200 dark:hover:bg-indigo-800 transition-colors">
                    All
                </button>
                <button @click="filter = 'favorites'"
                        :class="{'bg-indigo-100 dark:bg-indigo-900': filter === 'favorites', 'bg-gray-100 dark:bg-gray-700': filter !== 'favorites'}"
                        class="px-4 py-2 rounded-full text-white text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                    Favorites
                </button>
            </div>

            <!-- Conferences Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="conference in filteredConferences()" :key="conference.id">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300">
                        <!-- Conference Header -->
                        <div class="relative">
                            <div class="h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-t-lg"></div>
                            <!-- Favorite Button -->
                            <form :action="`/conferences/${conference.id}/${conference.is_favorited ? 'unfavorite' : 'favorite'}`"
                                  method="POST"
                                  class="absolute top-4 right-4">
                                @csrf
                                <button type="submit">
                                    <template x-if="conference.is_favorited">
                                        <svg class="w-6 h-6 text-red-500 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    </template>
                                    <template x-if="!conference.is_favorited">
                                        <svg class="w-6 h-6 text-white hover:text-red-500 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </template>
                                </button>
                            </form>
                        </div>

                        <div class="p-6 mt-4">
                            <!-- Conference Category Badge -->
                            <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200"
                                  x-text="conference.category || 'Conference'">
                            </span>

                            <!-- Conference Title -->
                            <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white"
                                x-text="conference.title">
                            </h3>

                            <!-- Conference Details -->
                            <div class="mt-4 space-y-3">
                                <template x-if="conference.date">
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span x-text="conference.date"></span>
                                    </div>
                                </template>

                                <template x-if="conference.location">
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span x-text="conference.location"></span>
                                    </div>
                                </template>

                                <template x-if="conference.description">
                                    <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-3"
                                       x-text="conference.description">
                                    </p>
                                </template>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex mb-auto justify-between">
                                <template x-if="conference.website">
                                    <a :href="conference.website"
                                       target="_blank"
                                       class="inline-flex items-center px-3 py-4 text-sm font-medium rounded-md text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/50 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Visit Website
                                    </a>
                                </template>

                                <button @click="addToCalendar(conference)" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Add to Calendar
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- Update Notification -->
    <div id="updateNotification"
         class="fixed bottom-4 right-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 hidden transform transition-all duration-300">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900 dark:text-white">
                    Checking for updates...
                </p>
            </div>
            <div class="ml-4 flex-shrink-0">
                <button onclick="hideNotification()" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript for Update Functionality -->
    <script>
        function checkForUpdates() {
            const notification = document.getElementById('updateNotification');
            notification.classList.remove('hidden');

            // Simulate checking for updates
            setTimeout(() => {
                notification.querySelector('p').textContent = 'Conferences are up to date!';

                // Hide notification after 3 seconds
                setTimeout(() => {
                    hideNotification();
                }, 3000);
            }, 1500);
        }

        function hideNotification() {
            const notification = document.getElementById('updateNotification');
            notification.classList.add('hidden');
        }

        function addToCalendar(conference) {
        // Dummy data for testing
        const data = {
            title: conference.title,
            start: conference.date_start,
            end: conference.date_end,
            type: 'add'
        };

        // Send POST request using fetch
        fetch('/fullcalenderAjax', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle successful response
            console.log('Success:', data);
            // You could show a success notification here
            const notification = document.getElementById('updateNotification');
            notification.querySelector('p').textContent = 'Event added to calendar!';
            notification.classList.remove('hidden');

            setTimeout(() => {
                hideNotification();
            }, 3000);
        })
        .catch((error) => {
            console.error('Error:', error);
            // You could show an error notification here
        });
    }
    </script>
</x-app-layout>
