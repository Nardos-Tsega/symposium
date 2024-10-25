
<div class="space-y-8">
    <!-- Title Section -->
    <div>
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Talk Details</h3>
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                    Title <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <input type="text" id="title" name="title"
                        value="{{ old('title', $talk->title) }}"
                        class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Enter a compelling title for your talk">
                    <x-input-error :messages="$errors->get('title')" class="mt-1" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                        Type <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <select id="type" name="type"
                            class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Select a type</option>
                            @foreach (App\Enums\TalkType::cases() as $talkType)
                                <option value="{{ $talkType->value }}"
                                    {{ $talkType->value === $talk->type ? 'selected' : '' }}>
                                    {{ ucfirst($talkType->value) }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-1" />
                    </div>
                </div>

                <div>
                    <label for="length" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                        Length <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" id="length" name="length"
                            value="{{ old('length', $talk->length) }}"
                            class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="e.g., 45 minutes">
                        <x-input-error :messages="$errors->get('length')" class="mt-1" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="border-t border-gray-200 dark:border-gray-600 pt-8">
        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100 mb-4">Content</h3>
        <div class="space-y-6">
            <div>
                <label for="abstract" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                    Abstract <span class="text-red-500">*</span>
                </label>
                <div class="mt-1">
                    <textarea id="abstract" name="abstract" rows="4"
                        class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Describe your talk in a compelling way...">{{ old('abstract', $talk->abstract) }}</textarea>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Write a compelling description that will make people want to attend your talk.
                        Be clear about what attendees will learn.
                    </p>
                    <x-input-error :messages="$errors->get('abstract')" class="mt-1" />
                </div>
            </div>

            <div>
                <label for="organizer_notes" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                    Organizer Notes
                </label>
                <div class="mt-1">
                    <textarea id="organizer_notes" name="organizer_notes" rows="4"
                        class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Any additional notes for the organizers...">{{ old('organizer_notes', $talk->organizer_notes) }}</textarea>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Optional notes for event organizers (not visible to the public).
                        Include any special requirements or preferences.
                    </p>
                    <x-input-error :messages="$errors->get('organizer_notes')" class="mt-1" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Actions -->
<div class="mt-8 pt-5 border-t border-gray-200 dark:border-gray-600">
    <div class="flex justify-end">
        <a href="{{ route('talks.index') }}"
           class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
        </a>
        <button type="submit"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Create Talk
        </button>
    </div>
</div>
