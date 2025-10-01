<div class="warning-popup" style="display: none">
    <div class="warning-container p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <p>Are you sure you want to delete {{ $employee->first_name . ' ' . $employee->last_name }}?</p>
        <div class="buttons">
            <x-primary-button onclick="togglePopupDisplay()">Cancel</x-primary-button>
            <form id="delete" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: none">
                @csrf
                @method('DELETE')
            </form>
            <x-primary-button form="delete">Delete</x-primary-button>
        </div>
    </div>
</div>