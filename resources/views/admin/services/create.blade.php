<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Nouveau service') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Ajouter votre nouveau service.') }}
                    </p>
                </header>
                <form action="{{ route('dashboard.services.store') }}" method="post">
                    <div>
                        <x-input-label for="name" :value="__('Nom du service')" />
                        <x-text-input id="name" class="w-full" type="text" name="name" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="w-full" type="text" name="description" placeholder="Votre description..." />
                    </div>

                    <div>
                        
                    </div>
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Prix')" />
                        <x-text-input id="price" class="w-full" type="number" name="price" required />
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
