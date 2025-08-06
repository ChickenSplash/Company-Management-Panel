<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <label>First Name</label>
                    <input type="text" name="first_name" class="bg-black" value="{{ old('first_name', $employee->first_name) }}">

                    <label>Last Name</label>
                    <input type="text" name="last_name" class="bg-black" value="{{ old('last_name', $employee->last_name) }}">
                    
                    <label>Email</label>
                    <input type="text" name="email" class="bg-black" value="{{ old('email', $employee->email) }}">

                    <label>Phone</label>
                    <input type="text" name="phone" class="bg-black" value="{{ old('phone', $employee->phone) }}">
                    
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>