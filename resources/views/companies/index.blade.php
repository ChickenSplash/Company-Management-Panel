<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('companies.index') }}">Companies</a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="index-list">
                @foreach ($companies as $company)
                    <x-company-list-item :company="$company">
                        <div class="card">
                            <img class="logo" src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('storage/logos/placeholder-logo.jpg') }}" alt="Company Logo">
                            <div class="details">
                                <h3>{{ $company->name }}</h3>
                                <p class="minor-details">Total Employees: {{ $company->employees()->count() }}</p>
                            </div>
                        </div>
                    </x-company-list-item>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>

