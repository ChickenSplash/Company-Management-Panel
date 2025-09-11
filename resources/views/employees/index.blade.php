<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('employees.index') }}">Employees</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
            <div class="table-wrapper mb-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="clickable-row" data-href="{{ route('employees.show', $employee->id) }}">
                                <td class="name-logo">
                                    <img class="logo" src="{{ $employee->logo ? asset('images/' . $employee->logo) : asset('images/placeholder-profile-picture.jpg') }}" alt="Employee Logo">
                                    <span>{{ $employee->first_name . ' ' . $employee->last_name }}</span>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $employees->links() }}
        </div>
    </div>
</x-app-layout>

