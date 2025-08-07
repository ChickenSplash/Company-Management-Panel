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
                        <div class="minor-details">
                            <p><strong>Employee ID:</strong> {{ $employee->id }}</p>
                            <p><strong>Email:</strong> <a class="link" href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
                            <p><strong>Phone:</strong> <a class="link" href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></p>
                        </div>
                    </div>
                    <h4>{{ $employee->first_name . ' ' . $employee->last_name }} is an employee of {{ $employee->company->name }}</h4>
                    <div class="name">
                        <img class="logo" src="{{ $employee->company->logo ? asset('storage/' . $employee->company->logo) : asset('storage/logos/placeholder-logo.jpg') }}" alt="Company Logo">
                        <div class="details">
                            <h3><a class="link" href="{{ route('companies.show', $employee->company->id) }}">{{ $employee->company->name }}</h3>
                            <p><a class="link" href="mailto:{{ $employee->company->email }}" target="_blank">{{ $employee->company->email }}</a></p>
                            <p><a class="link" href="{{ $employee->company->website }}" target="_blank">Visit Website</strong></a></p>
                        </div>
                    </div>
                    <div class="dates">
                        <p>Created on {{ $employee->created_at->format('jS F Y') }}</p>
                        @if ($employee->created_at != $employee->updated_at)
                            <p>Updated on {{ $employee->updated_at->format('jS F Y') }}</p>
                        @endif
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