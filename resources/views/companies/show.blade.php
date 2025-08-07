<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company: ' . $company->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="company">
                    <div class="name">
                        <img class="logo" src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/logos/placeholder-logo.jpg') }}" alt="Company Logo">
                        <h3>{{ $company->name }}</h3>
                    </div>
                    <div class="info">
                        <p><strong>Email:</strong> <a>{{ $company->email }}</a></p>
                        <p><strong>Website:</strong> <a>{{ $company->website }}</a></p>
                        @foreach ($company->employees as $employee)
                            <p><a href="{{ route('employees.show', $employee->id)}}">{{ $employee->first_name . ' ' . $employee->last_name }}</a></p>
                        @endforeach
                    </div>
                    <div class="buttons">
                        <x-primary-link-button href="{{ route('companies.edit', $company->id) }}">Edit</x-primary-link-button>
                        <x-primary-link-button href="{{ route('companies.index') }}">Back</x-primary-link-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>