<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form id="update" class="form" action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid">
                        <div class="item">
                            <x-input-label for="first_name" :value="__('First Name:')" />
                            <x-text-input type="text" name="first_name" id="first_name" value="{{ old('first_name', $employee->first_name) }}" />
                            <x-input-error :messages="$errors->get('first_name')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="last_name" :value="__('Last Name:')" />
                            <x-text-input type="text" name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name) }}" />
                            <x-input-error :messages="$errors->get('last_name')" class="error" />  
                        </div>   
                        <div class="item">
                            <x-input-label for="email" :value="__('Email:')" />
                            <x-text-input type="text" name="email" id="email" value="{{ old('email', $employee->email) }}" />
                            <x-input-error :messages="$errors->get('email')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="phone" :value="__('Phone Number:')" />
                            <x-text-input type="text" name="phone" id="phone" value="{{ old('phone', $employee->phone) }}" />
                            <x-input-error :messages="$errors->get('phone')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="company_id" :value="__('Select Company:')" />
                            <x-text-input :select="true" name="company_id" id="company_id" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ (old('company_id', $employee->company_id) == $company->id) ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </x-text-input>
                        </div>
                    </div>
                </form>
                <form id="delete" action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                </form>
                <form id="back" action="{{ route('employees.show', $employee->id) }}" method="GET">
                </form>
                <div class="buttons border-t border-gray-100 dark:border-gray-700">
                    <x-primary-button form="update">Update</x-primary-button>
                    <x-primary-button form="delete">Delete</x-primary-button>
                    <x-primary-button form="back">Back</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>