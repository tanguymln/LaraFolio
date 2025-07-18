<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('components.datatable', [
                    'tableId' => 'pagination-table',
                    'tableHeaders' => ['Objet', 'Email', 'Message'],
                    'tableRows' => $contacts,
                    'tableRowFields' => ['name', 'email', 'message'],
                    'tableActions' => [
                        [
                            'route' => 'dashboard.contacts.show',
                            'icon' => 'eye',
                            'label' => __('Voir'),
                        ],
                        [
                            'route' => 'dashboard.contacts.destroy',
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
