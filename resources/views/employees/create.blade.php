<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('employees.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    {{-- Email --}}
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    {{-- Job Title --}}
                    <div>
                        <x-input-label for="job_title" :value="__('Job Title')" />
                        <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
                    </div>

                    {{-- Department Dropdown --}}
                    <div>
                        <x-input-label for="department_id" :value="__('Department')" />
                        <select id="department_id" name="department_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                            <option value="">-- Select Department --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('department_id')" />
                    </div>

                    {{-- Hire Date --}}
                    <div>
                        <x-input-label for="hire_date" :value="__('Hire Date')" />
                        <x-text-input id="hire_date" name="hire_date" type="date" class="mt-1 block w-full" :value="old('hire_date')" />
                        <x-input-error class="mt-2" :messages="$errors->get('hire_date')" />
                    </div>

                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('employees.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancel</a>
                        <x-primary-button>{{ __('Save Employee') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>