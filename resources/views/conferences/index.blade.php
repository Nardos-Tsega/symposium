<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Conferences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-24">
              <ul>
                @foreach ($conferences as $conference)
                  <li>{{ $conference->title }}</li>
                @endforeach
              </ul>
            </div>
        </div>
    </div>
</x-app-layout>
