@props(['label', 'column', 'sortBy', 'sortDirection', 'companyId'])

<th 
    class="clickable-row table-header" 
    data-href="{{ route('companies.show', array_merge(['id' => $companyId], request()->query(), ['sortBy' => $column, 'sortDirection' => ($sortBy === $column && $sortDirection === 'asc') ? 'desc' : 'asc'])) }}"
>
    {{ $label }}
    @if ($sortBy === $column)
        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
    @endif
</th>