<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('talks.index') }}"
                   class="mr-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $talk->title }}
                </h2>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('talks.edit', $talk) }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-700 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 dark:hover:bg-gray-500 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Talk
                </a>
                <x-delete-talk
                    route="{{ route('talks.destroy', $talk) }}"
                    text="Delete Talk"
                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150"
                />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Talk Header -->
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                                    {{ $talk->title }}
                                </h1>
                                <div class="mt-2 flex items-center space-x-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        {{ match($talk->type) {
                                            'keynote' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200',
                                            'workshop' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                            'lightning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                            default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200'
                                        } }}">
                                        {{ ucfirst($talk->type) }}
                                    </span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $talk->length }}
                                    </span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        Created {{ $talk->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Talk Content -->
                    <div class="mt-8 space-y-8">
                        <!-- Abstract -->
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                Abstract
                            </h2>
                            <div class="prose dark:prose-invert max-w-none">
                                @if ($talk->abstract)
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $talk->abstract }}
                                    </p>
                                @else
                                    <p class="text-gray-500 dark:text-gray-400 italic">
                                        No abstract provided
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Organizer Notes -->
                        @if ($talk->organizer_notes)
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                    Organizer Notes
                                </h2>
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $talk->organizer_notes }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Metadata -->
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Last Updated
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $talk->updated_at->format('F j, Y \a\t g:i A') }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                    Talk ID
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                    {{ $talk->id }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
