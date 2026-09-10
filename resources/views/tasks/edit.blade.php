<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Description --}}
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>{{ old('description', $task->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- Start Date --}}
                    <div>
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $task->start_date)" required />
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    </div>

                    {{-- End Date --}}
                    <div>
                        <x-input-label for="end_date" :value="__('End Date')" />
                        <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date', $task->end_date)" />
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>

                    {{-- Status --}}
                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">{{ __('Select Status') }}</option>
                            <option value="Not Started" {{ old('status', $task->status) == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                            <option value="In Progress" {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('tasks.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline">
                            {{ __('Cancel') }}
                        </a>
                        <x-primary-button>
                            {{ __('Update Task') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>