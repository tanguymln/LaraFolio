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
                    'tableHeaders' => ['Image', 'Nom', 'Description', 'Tags'],
                    'tableHeaderActions' => [
                        [
                            'route' => 'dashboard.projects.create',
                            'icon' => 'plus',
                            'label' => __('Ajouter un projet'),
                        ],
                    ],
                    'tableRows' => $projects,
                    'tableRowFields' => ['image', 'name', 'description', 'tags'],
                    'tableActions' => [
                        [
                            'route' => 'dashboard.services.edit',
                            'icon' => 'edit',
                            'label' => __('Modifier'),
                        ],
                        [
                            'route' => 'dashboard.services.destroy',
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
