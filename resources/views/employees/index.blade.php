<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('employees.index') }}">Employees</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
            <div class="table-wrapper mb-6">
                <table class="table">
                    <thead>
                        <tr>
                            <x-sortable-employees-column label="First Name" column="first_name" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                            <x-sortable-employees-column label="Last Name" column="last_name" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                            <x-sortable-employees-column label="Email" column="email" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                            <th>Number</th>
                            <x-sortable-employees-column label="Company Name" column="name" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="clickable-row" data-href="{{ route('employees.show', $employee->id) }}">
                                <td class="name-logo">
                                    <img class="logo" src="{{ $employee->logo ? asset('images/' . $employee->logo) : asset('images/placeholder-profile-picture.jpg') }}" alt="Employee Logo">
                                    {{ $employee->first_name }}
                                </td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $employees->appends([ // tell the paginator to pass in the url parameters so it doesnt overwrite them
                'sortBy' => $sortBy, 
                'sortDirection' => $sortDirection
            ])->links() }}
        </div>
    </div>
</x-app-layout>

