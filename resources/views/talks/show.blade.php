<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-24">
                <p>{{ $talk->title }}</p>
                <x-delete-talk route="{{ route('talks.destroy', ['talk'=>$talk]) }}" text="Delete this talk"/>
                <a href="{{ route('talks.edit', ['talk' => $talk]) }}" class="hover:underline">Edit this talk</a>
            </div>
        </div>
    </div>
</x-app-layout>
