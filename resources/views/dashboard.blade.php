<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('dashboard.index') }}">Dashboard</a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dashboard p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <h3>Welcome</h3>
                <p>There are <strong>{{ $employeeCount }}</strong> employees spread across <strong>{{ $companyCount }}</strong> Companies.</p>
                <h4 class="my-7 text-2xl font-bold">Recently Added Companies</h4>
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentCompanies as $company)
                                <tr class="clickable-row" data-href="{{ route('companies.show', $company->id) }}">
                                    <td class="name-logo">
                                        <img class="logo" src="{{ $company->logo ? asset('images/' . $company->logo) : asset('images/placeholder-logo.jpg') }}" alt="Company Logo">
                                        <span>{{ $company->name }}</span>
                                    </td>
                                    <td>{{ $company->updated_at->format('jS F Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <h4 class="my-7 text-2xl font-bold">Recently Added Employees</h4>
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentEmployees as $employee)
                                <tr class="clickable-row" data-href="{{ route('companies.show', $employee->id) }}">
                                    <td class="name-logo">
                                        <img class="logo" src="{{ $employee->logo ? asset('images/' . $employee->logo) : asset('images/placeholder-logo.jpg') }}" alt="Company Logo">
                                        <span>{{ $employee->first_name . ' ' . $employee->last_name }}</span>
                                    </td>
                                    <td>{{ $employee->updated_at->format('jS F Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <x-primary-link-button href="{{ route('employees.create') }}">Create Employee</x-primary-link-button>
                    <x-primary-link-button href="{{ route('companies.create') }}">Create Company</x-primary-link-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
