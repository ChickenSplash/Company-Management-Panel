<x-app-layout>
    <x-warning-popup-company :company="$company" />
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('companies.index') }}">Companies</a>
            / <a class="link" href="{{ route('companies.show', $company->id) }}">{{$company->name}}</a> 
            / <a class="link" href="{{ route('companies.edit', $company->id) }}">Edit</a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form id="update" class="form" action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid">
                        <div class="item">
                            <x-input-label for="name" :value="__('Name:')" />
                            <x-text-input type="text" name="name" value="{{ old('name', $company->name) }}" required />
                            <x-input-error :messages="$errors->get('name')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="email" :value="__('Email:')" />
                            <x-text-input type="text" name="email" value="{{ old('email', $company->email) }}" />
                            <x-input-error :messages="$errors->get('email')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="website" :value="__('Website:')" />
                            <x-text-input type="text" name="website" value="{{ old('website', $company->website) }}" />
                            <x-input-error :messages="$errors->get('website')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="logo" :value="__('Logo:')" />
                            <x-file-input name="logo" id="logo" />
                            <x-input-error :messages="$errors->get('logo')" class="error" />
                        </div>
                    </div>
                </form>
                <form id="back" action="{{ route('companies.show', $company->id) }}" method="GET"></form>
                <div class="buttons">
                    <x-primary-button form="update">Update</x-primary-button>
                    <x-primary-button onclick="togglePopupDisplay()">Delete</x-primary-button>
                    <x-primary-button form="back">Back</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>