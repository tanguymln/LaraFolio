@extends('layouts.guest')

@section('content')
    <div class="container mx-auto p-8 bg-gradient-to-br from-indigo-50 to-white dark:from-gray-900 dark:to-gray-800 rounded-2xl mt-12 lg:mb-24">
        <h1 class="text-3xl font-extrabold text-indigo-700 dark:text-indigo-300 mb-6 text-center">Contactez-moi</h1>
        <div class="space-y-10">
            <!-- Formulaire de Contact -->
            <div class="p-8 bg-white dark:bg-gray-700 rounded-2xl">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-5">Envoyer votre message</h2>
                <form action="{{ route('web.contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" :value="__('Nom complet')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 w-full" placeholder="Votre nom complet" required />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Adresse email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 w-full" placeholder="email@example.com" required />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="message" :value="__('Votre message')" />
                        <x-textarea id="message" name="message" class="mt-1 w-full" rows="4"
                            placeholder="Décrivez votre projet ou posez votre question..." required></x-textarea>
                    </div>

                    <div class="text-center">
                        <x-primary-button class="px-8 py-3 text-lg">
                            {{ __('Envoyer mon message') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
