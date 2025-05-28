@if (!empty($tableHeaderActions))
    <div class="flex justify-end mb-4">
        @foreach ($tableHeaderActions as $action)
            <a href="{{ route($action['route']) }}" class="btn btn-primary">
                <x-dynamic-component :component="'lucide-' . $action['icon']" class="w-4 h-4" />
                {{ $action['label'] }}
            </a>
        @endforeach
    </div>
@endif

<table id="{{ $tableId }}" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($tableHeaders as $header)
                <th>{{ $header }}</th>
            @endforeach

            @if (!empty($tableActions))
                <th>Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($tableRows as $row)
            <tr class="w-full">
                @foreach ($tableRowFields as $field)
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white w-1/4">
                        @if (is_array($field) && is_callable($field[key($field)]))
                            <!-- Si c'est un tableau et qu'il y a un callback, on l'exécute pour le premier champ -->
                            {!! $field[key($field)]($row) !!}
                        @else
                            <!-- Sinon, on affiche simplement la valeur du champ -->
                            {{ Str::limit(data_get($row, $field), 50) }}
                        @endif
                @endforeach

                @if (!empty($tableActions))
                    <td class="flex
                        gap-2 w-fit">
                        @foreach ($tableActions as $action)
                            @if (($action['method'] ?? 'get') === 'delete')
                                <form action="{{ route($action['route'], $row->id) }}" method="POST"
                                    onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="{{ $action['label'] }}" class="btn btn-error">
                                        <x-dynamic-component :component="'lucide-' . $action['icon']" class="w-4 h-4" />
                                        {{ $action['label'] }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route($action['route'], $row->id) }}" title="{{ $action['label'] }}" class="btn">
                                    <x-dynamic-component :component="'lucide-' . $action['icon']" class="w-4 h-4" />
                                    {{ $action['label'] }}
                                </a>
                            @endif
                        @endforeach
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = document.getElementById("{{ $tableId }}");
        if (table && typeof DataTable !== 'undefined') {
            new DataTable(table, {
                perPage: 5,
                perPageSelect: [5, 10, 20, 50],
                sortable: true,
                searchable: true,
                labels: {
                    placeholder: "Rechercher...",
                    perPage: "lignes par page",
                    noRows: "Aucune ligne trouvée",
                    info: "{start} à {end} sur {rows} lignes",
                },
            });
        }
    });
</script>
