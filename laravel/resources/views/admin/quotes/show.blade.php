<x-app-layout>
    <div class="max-w-4xl mx-auto p-8 bg-gradient-to-br from-indigo-100 to-indigo-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl mt-12">
        <h1 class="text-3xl font-bold text-indigo-800 dark:text-indigo-200 mb-6 text-center">Détails de votre devis</h1>
        <div class="space-y-6">
            <!-- Quote Info -->
            <div class="p-6 bg-white dark:bg-gray-700 rounded-xl border border-gray-200 dark:border-gray-600">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Informations personnelles</h2>
                <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                    <li><span class="font-medium">Nom :</span> {{ $quote->name }}</li>
                    <li><span class="font-medium">Email :</span> {{ $quote->email }}</li>
                    <li><span class="font-medium">Message :</span> {{ $quote->message }}</li>
                </ul>
            </div>

            <!-- Services List -->
            <div class="p-6 bg-white dark:bg-gray-700 rounded-xl border border-gray-200 dark:border-gray-600">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Services sélectionnés</h2>
                <div class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach ($quote->services as $service)
                        <div class="py-4 flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $service->name }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-300">{{ Str::limit($service->description, 100) }}</p>
                            </div>
                            <span
                                class="mt-3 md:mt-0 text-lg font-semibold text-indigo-700 dark:text-indigo-300">{{ number_format($service->price, 2, ',', ' ') }}€</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Total Display -->
            <div
                class="p-6 bg-white dark:bg-gray-700 rounded-xl border border-gray-200 dark:border-gray-600 flex flex-col md:flex-row md:items-center md:justify-between">
                <span class="text-lg font-medium text-gray-700 dark:text-gray-300">Total estimé :</span>
                <span class="mt-2 md:mt-0 text-3xl font-bold text-indigo-800 dark:text-indigo-200">
                    {{ number_format($quote->services->sum('price'), 2, ',', ' ') }}€</span>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('dashboard.quotes.index') }}"
                    class="inline-block px-8 py-3 bg-indigo-700 text-white font-medium rounded-full hover:bg-indigo-600 transition">
                    <x-lucide-arrow-left class="w-4 h-4 mr-2 inline-block" />
                    Retour
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
