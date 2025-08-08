@props(['company'])

<li class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
    <a class="p-6 block" href="{{ route('companies.show', $company->id) }}" class="block">
        {{ $slot }}
    </a>
</li>
