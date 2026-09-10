<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Task Details --}}

                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Title</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->title }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Description</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->description }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Start Date</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->start_date }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">End Date</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $task->end_date ?? '-' }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Status</h3>
                        @php
                            $statusClasses = match(strtolower($task->status)) {
                                'completed', 'active' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800',
                                'in progress', 'pending' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-400 border border-amber-200 dark:border-amber-800',
                                'not started', 'cancelled' => 'bg-rose-100 text-rose-800 dark:bg-rose-900/40 dark:text-rose-400 border border-rose-200 dark:border-rose-800',
                                default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-600',
                            };
                        @endphp
                        <span class="inline-flex items-center gap-x-[6px] px-[10px] py-[5px] rounded-md text-sm font-semibold shadow-sm {{ $statusClasses }}">
                            <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                            {{ $task->status }}
                        </span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-4 pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-600 transition ease-in-out duration-150">
                        {{ __('Back to Tasks') }}
                    </a>

                    <a href="{{ route('tasks.edit', $task) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-800 transition ease-in-out duration-150">
                        {{ __('Edit Task') }}
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>