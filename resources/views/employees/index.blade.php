<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('employees.index') }}">Employees</a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="index-list">
                @foreach ($employees as $employee)
                    <x-employee-list-item :employee="$employee">
                        <div class="card">
                            <img class="logo" src="{{ $employee->logo ? asset('storage/' . $employee->logo) : asset('images/placeholder-profile-picture.jpg') }}" alt="Employee Logo">
                            <div class="details">
                                <h3>{{ $employee->first_name . ' ' . $employee->last_name }}</h3>
                                <p class="minor-details">Company: {{ $employee->company->name }}</p>
                            </div>
                        </div>
                    </x-employee-list-item>
                @endforeach
            </ul>
            {{ $employees->links() }}
        </div>
    </div>
</x-app-layout>

