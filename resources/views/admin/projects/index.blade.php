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
                    'tableRowFields' => [
                        [
                            'image' => function ($row) {
                                return '<img src="' . asset($row->image) . '" alt="Image" class="w-16 h-16 object-cover">';
                            },
                        ],
                        'title',
                        'description',
                        [
                            'tags' => function ($row) {
                                return $row->tags->pluck('name')->join(', ');
                            },
                        ],
                    ],
                    'tableActions' => [
                        [
                            'route' => 'dashboard.projects.edit',
                            'icon' => 'edit',
                            'label' => __('Modifier'),
                        ],
                        [
                            'route' => 'dashboard.projects.destroy',
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
