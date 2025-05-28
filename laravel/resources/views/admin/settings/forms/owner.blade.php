<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier les informations du propriétaire') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Mettez à jour le nom et l\'adresse email du propriétaire. Ces données peuvent être visibles publiquement.') }}
        </p>
    </header>

    @if (session('success'))
        <div class="text-green-600 dark:text-green-400 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('dashboard.settings.owner') }}" class="space-y-4">
        @csrf
        @method('put')

        <div>
            <x-input-label for="owner_name" :value="__('Nom du propriétaire')" />
            <x-text-input id="owner_name" name="owner_name" type="text" class="mt-1 block w-full" :value="old('owner_name', $settings['owner_name'])" />
            <x-input-error :messages="$errors->get('owner_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="owner_email" :value="__('Email du propriétaire')" />
            <x-text-input id="owner_email" name="owner_email" type="email" class="mt-1 block w-full" :value="old('owner_email', $settings['owner_email'])" />
            <x-input-error :messages="$errors->get('owner_email')" class="mt-2" />
        </div>

        <div class="flex justify-end">
            <x-primary-button type="submit">
                {{ __('Enregistrer les modifications') }}
            </x-primary-button>
        </div>
    </form>
</section>
