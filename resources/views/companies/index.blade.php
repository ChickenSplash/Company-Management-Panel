<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="link" href="{{ route('companies.index') }}">Companies</a>
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
            <div class="table-wrapper mb-12">
                <table class="table">
                    <thead>
                        <tr>
                            <x-sortable-companies-column label="Name" column="name" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                            <th>Employees</th>
                            <x-sortable-companies-column label="Email" column="email" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                            <x-sortable-companies-column label="Website" column="website" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                            <x-sortable-companies-column label="Last Updated" column="updated_at" :sortBy="$sortBy" :sortDirection="$sortDirection"/>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr class="clickable-row" data-href="{{ route('companies.show', $company->id) }}">
                                <td class="name-logo">
                                    <img class="logo" src="{{ $company->logo ? asset('images/' . $company->logo) : asset('images/placeholder-logo.jpg') }}" alt="Company Logo">
                                    <span>{{ $company->name }}</span>
                                </td>
                                <td class="numbered-cell">{{ $company->employees->count() }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ Str::replaceFirst('www.', '', parse_url($company->website, PHP_URL_HOST)) }}</td>
                                <td>{{ $company->updated_at->format('jS F Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $companies->appends([ // tell the paginator to pass in the url parameters so it doesnt overwrite them
                'sortBy' => $sortBy, 
                'sortDirection' => $sortDirection
            ])->links() }}
        </div>
    </div>
</x-app-layout>