<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <label>Name</label>
                    <input type="text" name="name" class="bg-black" value="{{ old('name', $company->name) }}">
                    
                    <label>Email</label>
                    <input type="text" name="email" class="bg-black" value="{{ old('email', $company->email) }}">
                    
                    <label>Website</label>
                    <input type="text" name="website" class="bg-black" value="{{ old('website', $company->website) }}">

                    <label for="logo">Company Logo:</label>
                    <input type="file" name="logo" id="logo">
                    @error('logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>