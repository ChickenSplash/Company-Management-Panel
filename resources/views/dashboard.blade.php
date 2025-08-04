<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul>
                @foreach ($companies as $company)
                    <x-company-list-item :company="$company">{{ $company->name }}</x-company-list-item>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
