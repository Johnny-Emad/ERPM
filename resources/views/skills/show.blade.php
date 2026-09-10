<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Skill Details') }}: {{ $skill->name }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('skills.edit', $skill) }}" class="inline-flex items-center px-4 py-2 bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition duration-150 ease-in-out shadow-sm">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('skills.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-150 ease-in-out shadow-sm">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-semibold">Category</span>
                        <span class="inline-flex items-center px-3 py-1 mt-1 rounded-md text-sm font-bold bg-indigo-100 text-indigo-800 dark:bg-indigo-900/40 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-800">
                            {{ $skill->category ?? 'General' }}
                        </span>
                    </div>
                    <div>
                        <span class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-semibold">Linked Projects</span>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">
                            {{ $skill->projects->count() }}
                        </p>
                    </div>
                </div>

                <div>
                    <span class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-semibold">Description</span>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">
                        {{ $skill->description ?? 'No description available.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>