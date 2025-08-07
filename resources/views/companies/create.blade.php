<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <form id="create" class="form" action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid">
                        <div class="item">
                            <x-input-label for="name" :value="__('Name:')" />
                            <x-text-input type="text" name="name" />
                            <x-input-error :messages="$errors->get('name')" class="error" />                            
                        </div>
                        <div class="item">
                            <x-input-label for="email" :value="__('Email:')" />
                            <x-text-input type="text" name="email" />
                            <x-input-error :messages="$errors->get('email')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="website" :value="__('Website:')" />
                            <x-text-input type="text" name="website" />
                            <x-input-error :messages="$errors->get('website')" class="error" />
                        </div>
                        <div class="item">
                            <x-input-label for="logo" :value="__('Logo:')" />
                            <x-file-input name="logo" id="logo" />
                            <x-input-error :messages="$errors->get('logo')" class="error" />
                        </div>
                    </div>
                </form>
                <form id="back" action="{{ route('companies.index') }}" method="GET">
                </form>
                <div class="buttons border-t border-gray-100 dark:border-gray-700">
                    <x-primary-button form="create">Create</x-primary-button>
                    <x-primary-button form="back">Back</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>