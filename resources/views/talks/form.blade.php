<div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
        <div>
            <label for="title" class="block text-sm font-medium text-white">Title</label>
            <input type="text" id="title" name="title"
                    value="{{ old('title', $talk->title) }}"
                   class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   placeholder="How to save a life">
            <x-input-error :messages="$errors->get('title')" class="mt-1" />
        </div>

        <div class="grid grid-cols-2 gap-4 mt-6">
            <div>
                <label for="type" class="block text-sm font-medium text-white">Type</label>
                <select id="type" name="type"
                        class="mt-1 block w-full bg-gray-700 border-gray-600  rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach (App\Enums\TalkType::cases() as $talkType)
                        <option value="{{ $talkType->value }}" {{ $talkType->value === $talk->type ? 'selected' : '' }}>{{ $talkType->value }}</option>)
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('type')" class="mt-1" />
            </div>
            <div>
                <label for="length" class="block text-sm font-medium text-white">Length</label>
                <input type="text" id="length" name="length"
                        value="{{ old('length', $talk->length) }}"
                    class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600   shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <x-input-error :messages="$errors->get('length')" class="mt-1" />
            </div>
        </div>


        <div class="mt-6">
            <label for="abstract" class="block text-sm font-medium text-white">Abstract</label>
            <textarea id="abstract" name="abstract" rows="4"
                      class="mt-1 block w-full bg-gray-700 border-gray-600  rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                      {{ old('abstract', $talk->abstract) }}
                    </textarea>
            <p class="mt-1 text-sm text-gray-300">Describe the talk in a few sentences, in a way that's compelling and
                informative and could be presented to the public.</p>
            <x-input-error :messages="$errors->get('abstract')" class="mt-1" />
        </div>

        <div class="mt-6">
            <label for="organizer_notes" class="block text-sm font-medium text-white">Organizer Notes</label>
            <textarea id="organizer_notes" name="organizer_notes" rows="4"
                      class="mt-1 block w-full rounded-md bg-gray-700 border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    {{ old('organizer_notes', $talk->organizer_notes) }}
                    </textarea>
            <p class="mt-1 text-sm text-gray-300">Write any notes you may want to pass to an event organizer about this
                talk.</p>
            <x-input-error :messages="$errors->get('organizer_notes')" class="mt-1" />
        </div>

    </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-white">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
