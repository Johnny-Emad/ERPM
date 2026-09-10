<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Projects') }}
            </h2>
            <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-800 transition duration-150 ease-in-out shadow-sm">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ __('Create Task') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Table without horizontal scrolling --}}
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 w-1/4">Title</th>
                            <th scope="col" class="px-4 py-3 w-1/4 hidden md:table-cell">Description</th>
                            <th scope="col" class="px-4 py-3 w-1/6 hidden sm:table-cell">Start Date</th>
                            <th scope="col" class="px-4 py-3 w-1/6 hidden lg:table-cell">End Date</th>
                            <th scope="col" class="px-4 py-3 w-1/6">Status</th>
                            <th scope="col" class="px-4 py-3 w-auto text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-150">
                                {{-- Title --}}
                                <td class="px-4 py-4 font-medium text-gray-900 dark:text-white truncate">
                                    {{ $task->title }}
                                </td>

                                {{-- Description --}}
                                <td class="px-4 py-4 truncate hidden md:table-cell">
                                    {{ $task->description }}
                                </td>

                                {{-- Start Date --}}
                                <td class="px-4 py-4 whitespace-nowrap hidden sm:table-cell">
                                    {{ $task->start_date }}
                                </td>

                                {{-- End Date --}}
                                <td class="px-4 py-4 whitespace-nowrap hidden lg:table-cell">
                                    {{ $task->end_date ?? '-' }}
                                </td>

                                {{-- Status Badge --}}
                                <td class="px-4 py-4 whitespace-nowrap">
                                    @php
                                        $statusClasses = match(strtolower($task->status)) {
                                            'completed', 'active' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800',
                                            'in progress', 'pending' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-400 border border-amber-200 dark:border-amber-800',
                                            'not started', 'cancelled' => 'bg-rose-100 text-rose-800 dark:bg-rose-900/40 dark:text-rose-400 border border-rose-200 dark:border-rose-800',
                                            default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-6<PASSWORD>   00',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-semibold shadow-sm {{ $statusClasses }}">
                                        <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                        {{ $task->status }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-4 text-right whitespace-nowrap space-x-2">
                                    <a href="{{ route('tasks.show', $task) }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">View</a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="font-medium text-amber-600 dark:text-amber-400 hover:underline">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-400 hover:underline border-none bg-transparent cursor-pointer p-0">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    No tasks found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>