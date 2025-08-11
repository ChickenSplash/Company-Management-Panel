<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('companies.index') }}">Companies</a>
            / <a class="link" href="{{ route('companies.show', $company->id) }}">{{$company->name}}</a> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="company">
                    <div class="card">
                        <img class="logo" src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('images/placeholder-logo.jpg') }}" alt="Company Logo">
                        <div class="details">
                            <h3>{{ $company->name }}</h3>
                            @if ($company->email)
                                <p><a class="link" href="mailto:{{ $company->email }}" target="_blank">{{ $company->email }}</a></p>
                            @endif
                            @if ($company->website)
                                <p><a class="link" href="{{ $company->website }}" target="_blank">Visit Website</strong></a> <span class="link-text">({{ Str::limit($company->website, 50) }})</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="info">
                        @if ($company->employees()->count())
                            <h4>Total Employees: {{ $company->employees()->count() }}</h4>
                            <div class="employee-table-wrapper">
                                <table class="employee-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($company->employees as $employee)
                                            <tr class="clickable-row" data-href="{{ route('employees.show', $employee->id) }}">
                                                <td>{{ $employee->id }}</td>
                                                <td>{{ Str::limit($employee->first_name . ' ' . $employee->last_name, 20) }}</td>
                                                <td>{{ Str::limit($employee->email, 20) }}</td>
                                                <td>{{ $employee->phone }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h4>This company has no employees.</h4>
                        @endif
                    </div>
                    <div class="dates">
                        <p>Created on {{ $company->created_at->format('jS F Y') }}</p>
                        @if ($company->created_at != $company->updated_at)
                            <p>Updated on {{ $company->updated_at->format('jS F Y') }}</p>
                        @endif
                    </div>
                    <div class="buttons">
                        <x-primary-link-button href="{{ route('companies.edit', $company->id) }}">Edit</x-primary-link-button>
                        <x-primary-link-button href="{{ route('employees.create', $company->id) }}">Add Employee</x-primary-link-button>
                        <x-primary-link-button href="{{ route('companies.index') }}">Back</x-primary-link-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>