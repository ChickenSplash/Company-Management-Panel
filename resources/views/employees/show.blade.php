<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('employees.index') }}">Employees</a> 
            / <a class="link" href="{{ route('employees.show', $employee->id) }}">{{$employee->first_name . ' ' . $employee->last_name}}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="employee">
                    <h3 class="name">{{ $employee->first_name . ' ' . $employee->last_name }}</h3>
                    <div class="main-details">
                        <div class="card">
                            <img class="logo" src="{{ $employee->profile_picture ? asset('images/' . $employee->profile_picture) : asset('images/placeholder-profile-picture.jpg') }}" alt="Company Logo">
                            <div class="minor-details">
                                <p><strong>Employee ID:</strong> {{ $employee->id }}</p>
                                @if ($employee->email)
                                    <p><strong>Email:</strong> <a class="link" href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></p>
                                @endif
                                @if ($employee->phone)
                                    <p><strong>Phone:</strong> <a class="link" href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></p>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <img class="logo" src="{{ $employee->company->logo ? asset('images/' . $employee->company->logo) : asset('images/placeholder-logo.jpg') }}" alt="Company Logo">
                            <div class="details">
                                <h3><a class="link" href="{{ route('companies.show', $employee->company->id) }}">{{ $employee->company->name }}</h3>
                                <p><a class="link" href="mailto:{{ $employee->company->email }}" target="_blank">{{ $employee->company->email }}</a></p>
                                <p><a class="link" href="{{ $employee->company->website }}" target="_blank">Visit Website</strong></a></p>
                            </div>
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