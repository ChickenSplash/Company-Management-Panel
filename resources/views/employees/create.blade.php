<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form id="create" class="form" action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="grid">
                        <div class="item">
                            <x-input-label for="first_name" :value="__('First Name:')" />
                            <x-text-input type="text" name="first_name" id="first_name" />
                            <x-input-error :messages="$errors->get('first_name')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="last_name" :value="__('Last Name:')" />
                            <x-text-input type="text" name="last_name" id="last_name" />
                            <x-input-error :messages="$errors->get('last_name')" class="error" />  
                        </div>
                        <div class="item">
                            <x-input-label for="email" :value="__('Email:')" />
                            <x-text-input type="text" name="email" id="email" />
                            <x-input-error :messages="$errors->get('email')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="phone" :value="__('Phone Number:')" />
                            <x-text-input type="text" name="phone" id="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="company_id" :value="__('Select Company:')" />
                            <x-text-input :select="true" name="company_id" id="company_id" required>
                                <option value="">-- Choose Company --</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </x-text-input>
                        </div>
                    </div>
                </form>
                <form id="back" action="{{ route('employees.index') }}" method="GET">
                </form>
                <div class="buttons border-t border-gray-100 dark:border-gray-700">
                    <x-primary-button form="create">Create</x-primary-button>
                    <x-primary-button form="back">Back</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>