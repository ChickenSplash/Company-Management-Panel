<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    
                    <label>First Name</label>
                    <input type="text" name="first_name" class="bg-black">

                    <label>Last Name</label>
                    <input type="text" name="last_name" class="bg-black">
                    
                    <label>Email</label>
                    <input type="text" name="email" class="bg-black">

                    <label>Phone</label>
                    <input type="text" name="phone" class="bg-black">

                    <label for="company_id">Select Company</label>
                    <select name="company_id" id="company_id" required>
                        <option value="">-- Choose Company --</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>