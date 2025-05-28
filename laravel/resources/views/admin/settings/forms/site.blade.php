<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier les informations du site') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Mettez à jour le nom et la description de votre site. Ces données seront visibles publiquement.') }}
        </p>
    </header>

    @if (session('success'))
        <div class="text-green-600 dark:text-green-400 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('dashboard.settings.site') }}" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <x-input-label for="site_name" :value="__('Nom du site')" />
            <x-text-input id="site_name" name="site_name" type="text" class="mt-1 block w-full" :value="old('site_name', $settings['site_name'])" required />
            <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="site_description" :value="__('Description du site')" />
            <x-text-input id="site_description" name="site_description" type="text" class="mt-1 block w-full" :value="old('site_description', $settings['site_description'])" />
            <x-input-error :messages="$errors->get('site_description')" class="mt-2" />
        </div>

        <div>
            <x-dropzone name="site_logo" label="Logo du site" />
            <x-input-error :messages="$errors->get('site_logo')" class="mt-2" />
        </div>

        <div class="flex justify-end">
            <x-primary-button type="submit">
                {{ __('Enregistrer les modifications') }}
            </x-primary-button>
        </div>
    </form>
</section>
