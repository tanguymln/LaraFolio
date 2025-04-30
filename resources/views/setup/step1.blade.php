@extends('./layouts.setup')

@section('content')
<div class="w-fit mx-auto bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg p-6">
    <h1 class="text-3xl text-blue-400 font-bold">Configuration de l'application</h1>
    <p class="text-gray-500">Etape 1 : Configuration du nom du site</p>
    <hr class="my-6">

    <form method="POST" action="{{ route('setup.store') }}">
        @csrf

        <!-- Site name -->
        <div>
            <x-input-label for="site_name" class="text-blue-400">Nom du site</x-input-label>
            <x-text-input id="site_name" class="block mt-1 w-full" type="text" name="site_name" :value="old('site_name')" required autofocus autocomplete="site_name" />
            <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
        </div>

        <div class="mt-4 w-full flex justify-end">
            <x-primary-button type="submit" class="ms-auto">Enregistrer</x-primary-button>
        </div>

    </form>
</div>

@endsection