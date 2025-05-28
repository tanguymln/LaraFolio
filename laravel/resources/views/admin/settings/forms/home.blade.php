<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Personnalisation de la page d\'accueil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Modifiez les textes et l’image affichés sur la page d’accueil de votre site. Ces informations sont visibles par tous les visiteurs.') }}
        </p>
    </header>

    @if (session('success'))
        <div class="text-green-600 dark:text-green-400 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('dashboard.settings.home') }}" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <x-input-label for="home_title" :value="__('Titre de la page d’accueil')" />
            <x-text-input id="home_title" name="home_title" type="text" class="mt-1 block w-full" :value="old('home_title', $settings['home_title'])" />
            <x-input-error :messages="$errors->get('home_title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="home_description" :value="__('Description de la page d’accueil')" />
            <x-text-input id="home_description" name="home_description" type="text" class="mt-1 block w-full" :value="old('home_description', $settings['home_description'])" />
            <x-input-error :messages="$errors->get('home_description')" class="mt-2" />
        </div>

        <div>
            <x-dropzone name="home_image_path" label="Image de la page d’accueil" />
            <x-input-error :messages="$errors->get('home_image_path')" class="mt-2" />
        </div>

        <div class="flex justify-end">
            <x-primary-button type="submit">
                {{ __('Enregistrer les modifications') }}
            </x-primary-button>
        </div>
    </form>
</section>
