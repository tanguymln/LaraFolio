@extends('layouts.guest')

@section('content')
    <div class="container mx-auto">
        <section class="flex flex-col md:flex-row items-center justify-center gap-8 p-8 lg:min-h-[800px]">
            <div class="flex-1 flex flex-col gap-4">
                <div>
                    <p class="text-blue-500 font-semibold">Salut 👋, je suis</p>
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white">{{ explode(' ', $settings['owner_name'])[0] ?? 'Nicolas' }} <span
                            class="text-blue-500 font-bold">{{ explode(' ', $settings['owner_name'])[1] ?? 'Leroy' }}</span></h1>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-semibold">Développeur Web
                        FullStack</p>
                </div>

                <div>
                    <a href="{{ route('contact') }}" class="btn btn-primary">Contactez-moi</a>
                </div>
            </div>
            <div class="flex-1 relative">
                @if ($settings['home_image_path'])
                    <img src="{{ config('app.url') . '/' . $settings['home_image_path'] }}" alt="Photo de Nicolas Leroy" class="relative z-10" />
                @else
                    <img src="{{ asset('assets/hero-image.png') }}" alt="Photo de Nicolas Leroy" class="relative z-10" />
                @endif
                <span class="absolute lg:-right-28 bottom-0 w-[500px] h-[500px] bg-blue-500 rounded-full -z-0"></span>
            </div>
        </section>

        <hr class="my-8">

        <section class="py-16 px-4 md:px-8">
            <div class="text-center mb-12">
                <p class="text-blue-500 text-lg font-semibold uppercase">Ce que je propose</p>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white">Mes services</h1>
                <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Découvrez les services que je propose pour vous accompagner dans la réalisation de vos projets web.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @if (count($services) > 0)
                    @foreach ($services as $service)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col gap-4">
                            <!-- Icon placeholder -->
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center">
                                <!-- Exemple SVG icône générique -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $service->name }}</h2>
                            <p class="text-gray-600 dark:text-gray-400">{{ $service->description }}</p>
                        </div>
                    @endforeach
                @else
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Service {{ $i }}</h2>
                            <p class="text-gray-600 dark:text-gray-400">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                            </p>
                        </div>
                    @endfor
                @endif
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('quotes') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition">
                    Demander un devis
                </a>
            </div>
        </section>

        <hr class="my-8">

        <div class="flex flex-col items-center justify-center gap-8 p-8 mb-16">
            <div class="w-full">
                <p class="text-xl font-semibold text-blue-500 text-center">Mes créations</p>
                <h1 class="text-5xl font-extrabold text-center">Récent projets</h1>
                <p class="text-md text-gray-500 w-full md:w-1/2 mx-auto text-center">Découvrez mon
                    parcours
                    professionnel et mes compétences.</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 w-full mt-4">
                @if (count($projects) > 0)
                    @foreach ($projects ?? range(1, 3) as $i => $project)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden transform hover:scale-[1.02] transition duration-300">
                            <div class="h-48 w-full bg-gray-200 overflow-hidden">
                                @if (isset($project->image))
                                    <img src="{{ config('app.url') . '/' . $project->image }}"
                                        alt="Image du projet {{ $project->title ?? 'Projet ' . ($i + 1) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <span class="text-sm">Aucune image</span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                                    {{ $project->title ?? 'Projet ' . ($i + 1) }}
                                </h2>
                                <p class="text-gray-500 mt-2 text-sm">
                                    {{ Str::limit($project->description ?? 'Description non fournie.', 100) }}
                                </p>
                                @if (!empty($service->tags))
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($service->tags as $tag)
                                            <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded-full">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i < 3; $i++)
                        <div class="flex-1 flex flex-col gap-4">
                            <div class="w-full h-[300px] bg-gray-200 rounded-lg"></div>
                            <h2 class="text-xl font-bold">Projet {{ $i + 1 }}</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.
                                Sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    @endfor
                @endif

            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('quotes') }}" class="btn btn-primary">Demander un devis</a>
            </div>
            </section>
        </div>
    </div>

    <section class="flex flex-col items-center justify-center gap-8 px-8 py-20 bg-violet-100">
        <div class="w-full">
            <p class="text-xl font-semibold text-blue-500 text-center">Me contacter</p>
            <h1 class="text-5xl font-extrabold text-center">Vous avez un projet ?</h1>
            <p class="text-md text-gray-500 w-full md:w-1/2 mx-auto text-center">N'hésitez pas à me
                contacter pour discuter de votre projet ou pour toute autre question.</p>
            <div class="mt-4 text-center">
                <a href="{{ route('contact') }}" class="btn btn-primary">Contactez-moi</a>
            </div>
        </div>
    </section>
@endsection
