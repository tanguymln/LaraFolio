@extends('layouts.guest')

@section('content')
    <div class="container mx-auto p-8 bg-gradient-to-br from-indigo-50 to-white dark:from-gray-900 dark:to-gray-800 rounded-2xl mt-12 lg:mb-24">
        <h1 class="text-3xl font-extrabold text-indigo-700 dark:text-indigo-300 mb-6 text-center">Calculatrice de devis estimatif</h1>
        <div id="quote-calculator" class="space-y-10">
            <!-- Services selection -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Choisissez vos services</h2>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($services as $service)
                        <label
                            class="group relative block p-6 border border-transparent rounded-xl bg-white dark:bg-gray-700 hover:border-indigo-300 hover:shadow-lg transition ease-out duration-300 cursor-pointer">
                            <input type="checkbox" class="peer absolute inset-0 w-full h-full opacity-0 cursor-pointer service-checkbox"
                                value="{{ $service->price }}" data-id="{{ $service->id }}">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-indigo-600 transition">
                                        {{ $service->name }}</h3>
                                    <span
                                        class="text-lg font-semibold text-indigo-600 dark:text-indigo-400">{{ number_format($service->price, 2, ',', ' ') }}€</span>
                                </div>
                                <p class="text-gray-500 dark:text-gray-300 group-hover:text-gray-700 dark:group-hover:text-gray-100 transition">
                                    {{ Str::limit($service->description, 80) }}</p>
                            </div>
                            <div class="absolute top-2 right-2 opacity-0 peer-checked:opacity-100 transition duration-200">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Total display -->
            <div class="text-right">
                <span class="text-xl font-medium text-gray-700 dark:text-gray-300">Total estimé :</span>
                <span id="total-price" class="ml-4 text-4xl font-extrabold text-indigo-600 dark:text-indigo-400">0,00€</span>
            </div>

            <!-- Quote request form -->
            <div class="mt-10 p-8 bg-white dark:bg-gray-700 rounded-2xl shadow-inner">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-5">Envoyer ma demande de devis</h2>
                <form id="quote-form" action="{{ route('web.quotes.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="services" id="services-input">
                    <input type="hidden" name="total_price" id="total-input">

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
                        <x-input-label for="message" :value="__('Description de la demande')" />
                        <x-textarea id="message" name="message" class="mt-1 w-full" rows="4"
                            placeholder="Dites-nous en plus sur votre projet..." />
                    </div>

                    <div class="text-center">
                        <x-primary-button class="px-8 py-3 text-lg">
                            {{ __('Envoyer ma demande') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.service-checkbox');
            const totalEl = document.getElementById('total-price');
            const servicesInput = document.getElementById('services-input');
            const totalInput = document.getElementById('total-input');

            function updateTotal() {
                let total = 0;
                const selected = [];
                checkboxes.forEach(cb => {
                    if (cb.checked) {
                        total += parseFloat(cb.value);
                        selected.push(cb.dataset.id);
                    }
                });
                totalEl.textContent = total.toLocaleString('fr-FR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + '€';
                servicesInput.value = JSON.stringify(selected);
                totalInput.value = total;
            }

            checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));
        });
    </script>
@endsection
@endsection
