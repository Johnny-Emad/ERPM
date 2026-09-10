<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-800 transition duration-150 ease-in-out shadow-sm">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ __('Create Task') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            {{-- Flash Success Message --}}
            @if (session('success'))
                <div class="p-4 text-sm text-emerald-800 rounded-lg bg-emerald-50 dark:bg-gray-800 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3 w-1/5">Title</th>
                            <th scope="col" class="px-4 py-3 w-1/6 hidden md:table-cell">Project</th>
                            <th scope="col" class="px-4 py-3 w-1/6 hidden sm:table-cell">Assigned To</th>
                            <th scope="col" class="px-4 py-3 w-1/6 hidden lg:table-cell">Due Date</th>
                            <th scope="col" class="px-4 py-3 w-1/6">Priority / Status</th>
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

                                {{-- Project Name --}}
                                <td class="px-4 py-4 truncate hidden md:table-cell text-gray-700 dark:text-gray-300">
                                    {{ $task->project->title ?? 'N/A' }}
                                </td>

                                {{-- Team Member (Assigned User) --}}
                                <td class="px-4 py-4 whitespace-nowrap hidden sm:table-cell font-medium text-gray-800 dark:text-gray-200">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-indigo-500 text-white flex items-center justify-center text-xs uppercase font-bold">
                                            {{ substr($task->assignedUser->name ?? 'U', 0, 1) }}
                                        </div>
                                        <span>{{ $task->assignedUser->name ?? 'Unassigned' }}</span>
                                    </div>
                                </td>

                                {{-- Due Date --}}
                                <td class="px-4 py-4 whitespace-nowrap hidden lg:table-cell">
                                    {{ $task->due_date ?? '-' }}
                                </td>

                                {{-- Status & Priority Badges --}}
                                <td class="px-4 py-4 whitespace-nowrap space-y-1">
                                    @php
                                        $statusClasses = match(strtolower($task->status)) {
                                            'completed' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-400 border-emerald-200',
                                            'in progress' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-400 border-amber-200',
                                            default => 'bg-rose-100 text-rose-800 dark:bg-rose-900/40 dark:text-rose-400 border-rose-200',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-xs font-semibold border {{ $statusClasses }}">
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

            {{-- Tailwind Pagination Links --}}
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>

        </div>
    </div>

</x-app-layout>