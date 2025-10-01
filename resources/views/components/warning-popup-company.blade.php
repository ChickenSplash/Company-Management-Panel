<div class="warning-popup" style="display: none">
    <div class="p-6 mb-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
        <p>Are you sure you want to delete {{ $company->name }}?</p>
        @if($company->employees()->exists())
            <div class="mt-6">
                <x-input-label for="confirm-name" :value="'Type the company name to confirm.'" />
                <x-text-input type="text" id="confirm-name" class="w-full" oninput="checkCompanyName('{{ $company->name }}')" />
            </div>
        @endif
        <div class="buttons">
            <x-primary-button onclick="togglePopupDisplay()">Cancel</x-primary-button>
            <form id="delete" action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: none">
                @csrf
                @method('DELETE')
            </form>
            @if($company->employees()->exists())
                <x-primary-button id="delete-btn" form="delete" disabled class="opacity-50 cursor-not-allowed">
                    Delete
                </x-primary-button>
            @else
                <x-primary-button id="delete-btn" form="delete">
                    Delete
                </x-primary-button>
            @endif
        </div>
    </div>
</div>