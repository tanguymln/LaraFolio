<x-app-layout>
    <div class="max-w-3xl mx-auto p-8 bg-gradient-to-br from-indigo-100 to-indigo-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl mt-12">
        <h1 class="text-3xl font-bold text-indigo-800 dark:text-indigo-200 mb-6 text-center">Détails de la demande de contact</h1>

        <div class="space-y-6">
            <!-- Contact Info -->
            <div class="p-6 bg-white dark:bg-gray-700 rounded-xl border border-gray-200 dark:border-gray-600">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Informations du contact</h2>
                <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                    <li><span class="font-medium">Nom :</span> {{ $contact->name }}</li>
                    <li><span class="font-medium">Email :</span> {{ $contact->email }}</li>
                    <li><span class="font-medium">Message :</span>
                        <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-md border border-gray-200 dark:border-gray-600">
                            {{ $contact->message }}
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('dashboard.contacts.index') }}"
                    class="inline-block px-8 py-3 bg-indigo-700 text-white font-medium rounded-full hover:bg-indigo-600 transition">
                    <x-lucide-arrow-left class="w-4 h-4 mr-2 inline-block" />
                    Retour
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
