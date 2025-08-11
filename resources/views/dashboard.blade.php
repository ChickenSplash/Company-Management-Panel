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
                <p>Create, Read, Update and Delete to your heart's content!</p>
                <p>There are <strong>{{ $employeeCount }}</strong> employees spread across <strong>{{ $companyCount }}</strong> Companies.
                <div class="buttons">
                    <x-primary-link-button href="{{ route('employees.create') }}">Create Employee</x-primary-link-button>
                    <x-primary-link-button href="{{ route('companies.create') }}">Create Company</x-primary-link-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
