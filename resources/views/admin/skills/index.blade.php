<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expérience') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('components.datatable', [
                    'tableId' => 'pagination-table',
                    'tableHeaders' => ['Nom', 'Description', 'Niveau', 'Lien'],
                    'tableHeaderActions' => [
                        [
                            'route' => 'dashboard.skills.create',
                            'icon' => 'plus',
                            'label' => __('Ajouter une expérience'),
                        ],
                    ],
                    'tableRows' => $skills,
                    'tableRowFields' => [
                        'name',
                        'description',
                        'level',
                        [
                            'link' => function ($skill) {
                                return $skill->link
                                    ? '<a href="' . $skill->link . '" target="_blank" class="text-blue-500 underline">' . $skill->link . '</a>'
                                    : '';
                            },
                        ],
                    ],
                    'tableActions' => [
                        [
                            'route' => 'dashboard.skills.edit',
                            'icon' => 'edit',
                            'label' => __('Modifier'),
                        ],
                        [
                            'route' => 'dashboard.skills.destroy',
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
