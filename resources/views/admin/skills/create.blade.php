< <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expérience') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Nouvelle expérience') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Ajouter votre nouvelle expérience.') }}
                    </p>
                </header>
                <form action="{{ route('dashboard.skills.store') }}" method="post">
                    <div>
                        <x-input-label for="name" :value="__('Nom de l\'expérience')" />
                        <x-text-input id="name" class="w-full" type="text" name="name" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="icon" :value="__('Niveau')" />
                        <select name="level" class="select w-full">
                            <option value="beginner">Débutant</option>
                            <option value="intermediate">Intermédiaire</option>
                            <option value="advanced">Avancé</option>
                            <option value="expert">Expert</option>
                            <option value="master">Maître</option>
                            <option value="god">Dieu</option>
                            <option value="legend">Légende</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="w-full" type="text" name="description" placeholder="Votre description..." />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="link" :value="__('Lien')" />
                        <x-text-input id="link" class="w-full" type="text" name="link" placeholder="https://example.com" />
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
