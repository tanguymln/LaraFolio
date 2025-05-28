@extends('layouts.guest')

@section('content')
    <!-- Header Section -->
    <section class="container mx-auto flex flex-col items-center justify-center gap-8 py-16 px-8 ">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white text-center">Services</h1>
        <p class="text-xl text-gray-600 dark:text-gray-300 text-center max-w-2xl mx-auto">
            Découvrez les services que je propose pour répondre à vos besoins en développement web et au-delà.
        </p>
    </section>

    <!-- Services Section -->
    <section class="py-16 px-8 bg-white dark:bg-gray-800">
        <div class="text-center mb-12 container mx-auto">
            <p class="text-blue-500 text-lg font-semibold uppercase">Mes services</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Ce que je propose</h2>
            <p class="text-md text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                En tant que développeur web, je propose des services variés pour vous aider à créer, optimiser et maintenir vos projets web.
            </p>
        </div>

        <!-- Loading Skeleton or Services -->
        <div class="container mx-auto grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($services as $service)
                <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden transform hover:scale-[1.02] transition duration-300">

                    <div class="p-6">
                        <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-4">
                            <!-- Exemple SVG icône générique -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $service->name }}</h3>
                        <p class="text-gray-500 mt-2 text-sm">{{ Str::limit($service->description, 100) }}</p>

                    </div>
                </div>
            @empty
                <!-- Skeleton Loader for Services -->
                @foreach (range(1, 3) as $i)
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden animate-pulse">
                        <div class="h-48 w-full bg-gray-200">
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <span class="text-sm">Chargement...</span>
                            </div>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="h-6 bg-gray-300 rounded w-3/4"></div>
                            <div class="h-4 bg-gray-300 rounded w-1/2"></div>
                            <div class="h-8 bg-gray-300 rounded w-1/3"></div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </section>

@endsection
