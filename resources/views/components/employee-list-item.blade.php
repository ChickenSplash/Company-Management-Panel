@props(['employee'])

<li class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg transition-colors duration-150 hover:bg-gray-600">
    <a class="p-6 block" href="{{ route('employees.show', $employee->id) }}" class="block">
        {{ $slot }}
    </a>
</li>
