<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 dark:text-gray-100 font-medium text-lg">
                    {{ __("You're logged in!") }} 👋
                </div>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Welcome to the ERPM dashboard. You can manage all system resources and tasks from here.
                </p>
            </div>

            {{-- Navigation Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Projects Card --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Projects</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage projects, track their statuses, and view required skills.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            Go to Projects &rarr;
                        </a>
                    </div>
                </div>

                {{-- Tasks Card --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tasks</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Track assigned tasks and assign them to registered users.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('tasks.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            Go to Tasks &rarr;
                        </a>
                    </div>
                </div>

                {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">الأقسام (Departments)</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">إدارة الهيكل التنظيمي للأقسام والموظفين التابعين لها.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('departments.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            الانتقال للأقسام &rarr;
                        </a>
                    </div>
                </div> --}}

                {{-- Employees Card --}}
                {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">الموظفون (Employees)</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">سجلات الموظفين، الرواتب، وتاريخ التعيين.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('employees.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            الانتقال للموظفين &rarr;
                        </a>
                    </div>
                </div> --}}

                {{-- Skills Card --}}
                {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">المهارات (Skills)</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">قائمة المهارات المتاحة وتصنيفاتها لربطها بالمشاريع.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('skills.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            الانتقال للمهارات &rarr;
                        </a>
                    </div>
                </div>--}}
                
                {{-- Trainings Card --}}
                {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">التدريبات (Trainings)</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">البرامج التدريبية وتتبع إتمام الموظفين لها.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('trainings.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            الانتقال للتدرّيبات &rarr;
                        </a>
                    </div>
                </div> --}}

            </div>

        </div>
    </div>

</x-app-layout>