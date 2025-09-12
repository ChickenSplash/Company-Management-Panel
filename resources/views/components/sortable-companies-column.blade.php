@props(['label', 'column', 'sortBy', 'sortDirection'])

<th 
    class="clickable-row table-header" 
    data-href="{{ route('companies.index', array_merge(request()->query(), ['sortBy' => $column, 'sortDirection' => ($sortBy === $column && $sortDirection === 'asc') ? 'desc' : 'asc'])) }}"
>                                     <!-- array_merge() url parameters so upon user changing sorting options to not overwrite the paginated page -->
    {{ $label }}
    @if ($sortBy === $column)
        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
    @endif
</th>