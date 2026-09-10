<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Title & Status Header --}}
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700 mb-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $project->title }}
                    </h3>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                        {{ $project->status ?? 'N/A' }}
                    </span>
                </div>

                {{-- Project Details Grid --}}
                <div class="space-y-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Description
                        </h4>
                        <p class="mt-2 text-gray-700 dark:text-gray-300 whitespace-pre-line leading-relaxed">
                            {{ $project->description }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Start Date
                            </h4>
                            <p class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-200">
                                {{ $project->start_date }}
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                End Date
                            </h4>
                            <p class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-200">
                                {{ $project->end_date ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                        {{ __('Back to Projects') }}
                    </a>

                    <a href="{{ route('projects.edit', $project) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-800 transition ease-in-out duration-150">
                        {{ __('Edit Project') }}
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>