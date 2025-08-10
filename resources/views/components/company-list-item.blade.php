@props(['company'])

<li class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 hover:bg-gray-600 shadow-sm sm:rounded-lg transition-colors duration-150">
    <a class="p-6 block" href="{{ route('companies.show', $company->id) }}">
        {{ $slot }}
    </a>
</li>
