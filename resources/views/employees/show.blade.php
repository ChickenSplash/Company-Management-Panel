<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee: ' . $employee->first_name . ' ' . $employee->last_name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="employee">
                    <div class="name">
                        <img class="logo" src="{{ $employee->profile_picture ? asset('storage/' . $employee->profile_picture) : asset('storage/logos/placeholder-profile-picture.jpg') }}" alt="Company Logo">
                        <h3>{{ $employee->first_name . ' ' . $employee->last_name }}</h3>
                    </div>
                    <div class="info">
                        <p><strong>Employee ID:</strong> {{ $employee->id }}</p>
                        <p><strong>Company:</strong> <a href="{{ route('companies.show', $employee->company_id) }}">{{ $employee->company->name }}</a></p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
                        <p><strong>Phone:</strong> <a href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></p>
                    </div>
                    <div class="buttons">
                        <x-primary-link-button href="{{ route('employees.edit', $employee->id) }}">Edit</x-primary-link-button>
                        <x-primary-link-button href="{{ route('employees.index') }}">Back</x-primary-link-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>