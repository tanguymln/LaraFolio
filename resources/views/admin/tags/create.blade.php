<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Étiquettes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Nouvelle étiquettes') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Ajouter votre nouvelle étiquettes.') }}
                    </p>
                </header>
                <form action="{{ route('dashboard.tags.store') }}" method="post">
                    <div>
                        <x-input-label for="name" :value="__('Nom de l\'étiquette')" />
                        <x-text-input id="name" class="w-full" type="text" name="name" required autofocus />
                    </div>

                    @csrf
                    <div class="flex items
                        justify-end gap-2 mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Créer') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
