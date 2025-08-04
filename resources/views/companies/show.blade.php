<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <h3>{{ $company->name }}</h3>
                <a class="block">{{ $company->email }}</a>
                <a class="block">Visit Website</a>
                <a href="/">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>