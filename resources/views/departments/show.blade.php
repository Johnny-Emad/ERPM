<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Department Details') }}: {{ $department->name }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('departments.edit', $department) }}" class="inline-flex items-center px-4 py-2 bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition duration-150 ease-in-out shadow-sm">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('departments.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-150 ease-in-out shadow-sm">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Department Info Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-semibold">Department Code</span>
                        <span class="inline-flex items-center px-3 py-1 mt-1 rounded-md text-sm font-bold bg-indigo-100 text-indigo-800 dark:bg-indigo-900/40 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-800">
                            {{ $department->code }}
                        </span>
                    </div>
                    <div>
                        <span class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-semibold">Total Employees</span>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">
                            {{ $department->employees->count() }}
                        </p>
                    </div>
                </div>

                <div>
                    <span class="text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 block font-semibold">Description</span>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">
                        {{ $department->description ?? 'No description provided.' }}
                    </p>
                </div>
            </div>

            {{-- Employees List Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Assigned Employees</h3>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Job Title</th>
                            <th scope="col" class="px-4 py-3">Hire Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($department->employees as $employee)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                    {{ $employee->name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $employee->job_title }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $employee->hire_date }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                    No employees assigned to this department yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>