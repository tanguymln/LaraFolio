<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Devis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('components.datatable', [
                    'tableId' => 'pagination-table',
                    'tableHeaders' => ['Nom', 'Email', 'Message', 'Prix'],
                    'tableRows' => $quotes,
                    'tableRowFields' => [
                        'name',
                        'email',
                        'message',
                        [
                            'price' => function ($quote) {
                                $price = array_reduce(
                                    $quote->services->toArray(),
                                    function ($carry, $service) {
                                        return $carry + $service['price'];
                                    },
                                    0);
                                return $price . ' €';
                            },
                        ],
                    ],
                    'tableActions' => [
                        [
                            'route' => 'dashboard.quotes.show',
                            'icon' => 'eye',
                            'label' => __('Voir'),
                        ],
                        [
                            'route' => 'dashboard.quotes.destroy',
                            'icon' => 'trash',
                            'label' => __('Supprimer'),
                            'method' => 'delete',
                        ],
                    ],
                ])
            </div>
        </div>
    </div>
</x-app-layout>
