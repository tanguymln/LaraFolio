@extends("layouts.guest")

@section("content")
    <div class="container mx-auto">
        <section class="flex flex-col md:flex-row items-center justify-center gap-8 p-8">
            <div class="flex-1 flex flex-col gap-4">
                <div>
                    <p class="text-blue-500 font-semibold">Salut 👋, je suis</p>
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white">Nicolas <span
                            class="text-blue-500 font-bold">Leroy</span></h1>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-semibold">Développeur Web
                        FullStack</p>
                </div>
                <p class="text-gray-400">Passionné par la création d'expériences web modernes, je conçois
                    et
                    développe des applications performantes, responsives et évolutives — du front-end au
                    back-end.</p>
                <div>
                    <a href="{{ route("contact") }}" class="btn btn-primary">Contactez-moi</a>
                </div>
            </div>
            <div class="flex-1 relative">
                <img src="{{ asset("assets/hero-image.png") }}" alt="Photo de Nicolas Leroy"
                    class="relative z-10" />
                <span
                    class="absolute lg:-right-28 bottom-0 w-[500px] h-[500px] bg-blue-500 rounded-full -z-0"></span>
            </div>
        </section>

        <hr class="my-8">

        <section class="flex flex-col items-center justify-center gap-8 p-8">
            <div class="w-full">
                <p class="text-xl font-semibold text-blue-500 text-center">Ce que je propose</p>
                <h1 class="text-5xl font-extrabold text-center">Mes services</h1>
                <p class="text-md text-gray-500 w-full md:w-1/2 mx-auto text-center">Découvrez les
                    services
                    que je
                    propose pour vous accompagner dans la réalisation de vos
                    projets web.</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 w-full mt-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex-1 flex flex-col gap-4">
                        <div class="w-full h-[300px] bg-gray-200 rounded-lg"></div>
                        <h2 class="text-xl font-bold">Service {{ $i + 1 }}</h2>
                        <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.
                            Sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                @endfor
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route("quotes") }}" class="btn btn-primary">Demander un devis</a>
            </div>
        </section>

        <hr class="my-8">

        <section class="flex flex-col items-center justify-center gap-8 p-8 mb-16">
            <div class="w-full">
                <p class="text-xl font-semibold text-blue-500 text-center">Mes créations</p>
                <h1 class="text-5xl font-extrabold text-center">Récent projets</h1>
                <p class="text-md text-gray-500 w-full md:w-1/2 mx-auto text-center">Découvrez mon
                    parcours
                    professionnel et mes compétences.</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-8 w-full mt-4">
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
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route("quotes") }}" class="btn btn-primary">Demander un devis</a>
            </div>
        </section>
    </div>

    <section class="flex flex-col items-center justify-center gap-8 px-8 py-20 bg-violet-100">
        <div class="w-full">
            <p class="text-xl font-semibold text-blue-500 text-center">Me contacter</p>
            <h1 class="text-5xl font-extrabold text-center">Vous avez un projet ?</h1>
            <p class="text-md text-gray-500 w-full md:w-1/2 mx-auto text-center">N'hésitez pas à me
                contacter pour discuter de votre projet ou pour toute autre question.</p>
            <div class="mt-4 text-center">
                <a href="{{ route("contact") }}" class="btn btn-primary">Contactez-moi</a>
            </div>
        </div>
    </section>
@endsection
