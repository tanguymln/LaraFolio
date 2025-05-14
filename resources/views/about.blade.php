@extends('layouts.guest')

@section('content')
    <!-- Header Section -->
    <section class="container mx-auto flex flex-col items-center justify-center gap-8 py-16 px-8 ">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white text-center">À propos de moi</h1>
        <p class="text-xl text-gray-600 dark:text-gray-300 text-center max-w-2xl mx-auto">
            Développeur web passionné, je suis dédié à la création de solutions performantes, à la fois fonctionnelles et esthétiques. Découvrez mon
            parcours, mes projets et mes compétences.
        </p>
    </section>

    <!-- Projects Section -->
    <section class="py-16 px-8 bg-white dark:bg-gray-800">
        <div class="text-center mb-12 container mx-auto">
            <p class="text-blue-500 text-lg font-semibold uppercase">Mes projets récents</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Ce que j'ai créé</h2>
            <p class="text-md text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Découvrez quelques-uns de mes projets récents qui mettent en valeur mes compétences en développement web.
            </p>
        </div>

        <!-- Loading Skeleton or Projects -->
        <div class="container mx-auto grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($projects as $project)
                <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden transform hover:scale-[1.02] transition duration-300">
                    <div class="h-48 w-full bg-gray-200 overflow-hidden">
                        @if ($project->image)
                            <img src="{{ config('app.url') . '/' . $project->image }}" alt="Image du projet {{ $project->title }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <span class="text-sm">Aucune image disponible</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $project->title }}</h3>
                        <p class="text-gray-500 mt-2 text-sm">{{ Str::limit($project->description, 100) }}</p>
                        <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">Voir plus</a>
                    </div>
                </div>
            @empty
                <!-- Skeleton Loader for Projects -->
                @foreach (range(1, 3) as $i)
                    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-md overflow-hidden">
                        <div class="h-48 w-full bg-gray-200 animate-pulse">
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <span class="text-sm">Chargement...</span>
                            </div>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="h-6 bg-gray-300 rounded w-3/4 animate-pulse"></div>
                            <div class="h-4 bg-gray-300 rounded w-1/2 animate-pulse"></div>
                            <div class="h-8 bg-gray-300 rounded w-1/3 animate-pulse"></div>
                        </div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </section>

    <!-- Skills Section -->
    <section class="container mx-auto py-16 px-8 bg-gray-100 dark:bg-gray-900">
        <div class="text-center mb-12">
            <p class="text-blue-500 text-lg font-semibold uppercase">Mes compétences</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Compétences clés</h2>
            <p class="text-md text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Mes compétences me permettent de vous offrir des solutions complètes pour vos projets web. Voici quelques-unes des technologies que je
                maîtrise.
            </p>
        </div>

        <!-- Loading Skeleton or Skills -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse ($skills as $skill)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 flex items-center justify-center flex-col">
                    <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $skill->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $skill->level }}</p>
                </div>
            @empty
                <!-- Skeleton Loader for Skills -->
                @foreach (range(1, 4) as $i)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 flex items-center justify-center flex-col animate-pulse">
                        <div class="w-16 h-16 bg-gray-300 rounded-full mb-4"></div>
                        <div class="h-6 bg-gray-300 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-300 rounded w-1/2 mt-2"></div>
                    </div>
                @endforeach
            @endforelse
        </div>
    </section>

    <section class="flex flex-col items-center justify-center gap-8 py-16 px-8 bg-violet-100 dark:bg-violet-900">
        <div class="w-full text-center container mx-auto">
            <p class="text-xl font-semibold text-blue-500">Prêt à collaborer ?</p>
            <h2 class="text-5xl font-extrabold text-gray-900 dark:text-white">Contactez-moi</h2>
            <p class="text-md text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-8">
                Vous avez un projet en tête ou vous souhaitez en savoir plus sur mes compétences ? N'hésitez pas à me contacter pour discuter de vos
                besoins.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg transition">Contactez-moi</a>
        </div>
    </section>
@endsection
