@props(['company'])

<li class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
    <div class="flex justify-between">
        <h3>{{ $slot }}</h3>
        <a href="{{ route('companies.show', $company->id) }}" class="block">View</a>
    </div>
</li>
