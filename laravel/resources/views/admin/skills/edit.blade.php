<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expérience') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Modifier l\'expérience') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Mettez à jour les détails de votre expérience.') }}
                    </p>
                </header>

                <form action="{{ route('dashboard.skills.update', $skill->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nom de l\'expérience')" />
                        <x-text-input id="name" class="w-full" type="text" name="name" value="{{ old('name', $skill->name) }}" required
                            autofocus />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="level" :value="__('Niveau')" />
                        <select name="level" id="level" class="select w-full">
                            @foreach ([
        'beginner' => 'Débutant',
        'intermediate' => 'Intermédiaire',
        'advanced' => 'Avancé',
        'expert' => 'Expert',
        'master' => 'Maître',
        'god' => 'Dieu',
        'legend' => 'Légende',
    ] as $value => $label)
                                <option value="{{ $value }}" {{ old('level', $skill->level) === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea id="description" class="w-full" name="description"
                            rows="4">{{ old('description', $skill->description) }}</x-textarea>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="link" :value="__('Lien')" />
                        <x-text-input id="link" class="w-full" type="url" name="link" placeholder="https://example.com"
                            value="{{ old('link', $skill->link) }}" />
                    </div>

                    <div class="flex items-center justify-end gap-2 mt-4">
                        <x-primary-button>
                            {{ __('Mettre à jour') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
