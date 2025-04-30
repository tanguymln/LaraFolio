@extends("layouts.guest")

@section("content")
    <section class="flex flex-col md:flex-row items-center justify-center gap-8 p-8">
        <div class="flex-1 flex flex-col gap-4">
            <div>
                <p>Salut 👋, je suis</p>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Nicolas <span
                        class="text-blue-500 font-bold">Leroy</span></h1>
                <p class="text-gray-500 dark:text-gray-400">Développeur Web FullStack</p>
            </div>
            <p class="text-gray-400">Passionné par la création d'expériences web modernes, je conçois et
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
                class="absolute -right-28 bottom-0 w-[500px] h-[500px] bg-blue-500 rounded-full -z-0"></span>
        </div>
    </section>

    <hr class="my-8">

    <section class="flex flex-col md:flex-row items-center justify-center gap-8 p-8">
        <div class="w-full">
            <p class="text-xl font-semibold text-blue-500 text-center">Ce que je propose</p>
            <h1 class="text-4xl font-extrabold text-center">Mes services</h1>
            <p class="text-md text-gray-500 w-full md:w-1/2 mx-auto text-center">Découvrez les services
                que je
                propose pour vous accompagner dans la réalisation de vos
                projets web.</p>
        </div>

    </section>
@endsection
