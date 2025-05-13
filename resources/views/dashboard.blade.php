<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200">
                {{ __('Tableau de bord') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
        <section id="visits" class="space-y-6 mt-4">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Visites par page</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                @php
                    $pages = ['/' => 'Accueil', 'about' => 'À propos', 'services' => 'Services', 'quotes' => 'Devis', 'contacts' => 'Contacts'];
                @endphp
                @foreach ($pages as $route => $label)
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 flex flex-col items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">{{ $label }}</div>
                        <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-300">
                            {{ $visits->where('route', $route)->count() }}
                        </div>
                        <div class="text-xs text-gray-400 mt-1">visites</div>
                    </div>
                @endforeach
            </div>

        </section>

        <!-- 2. Résumé global -->
        <section id="summary" class="space-y-4">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Résumé rapide</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Devis totaux</div>
                    <div class="mt-2 text-3xl font-bold text-green-600 dark:text-green-300">{{ $quotesCount }}</div>
                </div>
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Contacts reçus</div>
                    <div class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-300">{{ $contactsCount }}</div>
                </div>
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Services actifs</div>
                    <div class="mt-2 text-3xl font-bold text-purple-600 dark:text-purple-300">{{ $servicesCount }}</div>
                </div>
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Compétences</div>
                    <div class="mt-2 text-3xl font-bold text-yellow-600 dark:text-yellow-300">{{ $skillsCount }}</div>
                </div>
            </div>
        </section>

        <!-- 3. Dernières demandes de devis -->
        <section id="recent-quotes" class="space-y-4">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Dernières demandes de devis</h3>
            <div class="card">
                <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 ">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium">Client</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Email</th>
                                <th class="px-4 py-2 text-left text-sm font-medium">Total (€)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($recentQuotes as $q)
                                <tr>
                                    <td class="px-4 py-2 text-sm">{{ $q->name }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $q->email }}</td>
                                    <td class="px-4 py-2 text-sm text-indigo-600 font-bold">
                                        {{ number_format($q->services->sum('price'), 2, ',', ' ') }}€</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- 4. Services les plus populaires -->
        <section id="popular-services" class="space-y-4">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Services populaires</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($topServices as $service)
                    <div
                        class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <div>
                            <div class="font-semibold text-gray-900 dark:text-white">{{ $service->name }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $service->requests_count }} demandes</div>
                        </div>
                        <div class="text-lg font-bold text-indigo-600 dark:text-indigo-300">{{ number_format($service->price, 2, ',', ' ') }}€</div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 5. Derniers contacts -->
        <section id="recent-contacts" class="space-y-4">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Derniers contacts</h3>
            <ul class="space-y-2">
                @foreach ($recentContacts as $c)
                    <li
                        class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <div>
                            <div class="font-medium text-gray-900 dark:text-white">{{ $c->name }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $c->message }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
