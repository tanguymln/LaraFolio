<a href="/">
    @if ($siteLogo)
        <img src="{{ config('app.url') . '/' . $siteLogo }}" alt="{{ config('app.name') }}" class="w-20 h-20">
    @else
        <x-application-logo class="w-16 h-16 fill-current text-gray-800" />
    @endif
</a>

<nav class="flex-1 text-center">
    <ul class="flex justify-center items-center gap-2 py-4">
        <li class="py-2 px-4 rounded-lg hover:bg-gray-500 hover:bg-opacity-5 transition-colors">
            <a href="{{ route('about') }}">À Propos</a>
        </li>
        <li class="py-2 px-4 rounded-lg hover:bg-gray-500 hover:bg-opacity-5 transition-colors">
            <a href="{{ route('services') }}">Services</a>
        </li>
        <li class="py-2 px-4 rounded-lg hover:bg-gray-500 hover:bg-opacity-5 transition-colors">
            <a href="{{ route('quotes') }}">Devis</a>
        </li>
        <li class="py-2 px-4 rounded-lg hover:bg-gray-500 hover:bg-opacity-5 transition-colors">
            <a href="{{ route('contact') }}">Contact</a>
        </li>
    </ul>
</nav>

<div class="flex items-center gap-1">
    {{-- <button id="toggle-dark-mode"
        class="btn btn-white text-black dark:text-white bg-white dark:bg-gray-800">

        <span class="hidden dark:block">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-sun-icon lucide-sun">
                <circle cx="12" cy="12" r="4" />
                <path d="M12 2v2" />
                <path d="M12 20v2" />
                <path d="m4.93 4.93 1.41 1.41" />
                <path d="m17.66 17.66 1.41 1.41" />
                <path d="M2 12h2" />
                <path d="M20 12h2" />
                <path d="m6.34 17.66-1.41 1.41" />
                <path d="m19.07 4.93-1.41 1.41" />
            </svg>
        </span>

        <span class="block dark:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-moon-icon lucide-moon">
                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
            </svg>
        </span>
    </button> --}}

    @auth
        <a href="{{ route('dashboard.index') }}" class="btn btn-white m-1 text-black dark:text-white bg-white dark:bg-gray-800">Dashboard</a>
    @endauth
    @guest
        <a href="{{ route('login') }}" class="btn btn-white m-1 text-black dark:text-white bg-white dark:bg-gray-800">Connexion</a>
        @if (!$isRegistered)
            <a href="{{ route('register') }}" class="btn btn-white border-none m-1 text-white bg-blue-500 hover:bg-blue-600">Inscription</a>
        @endif
    @endguest
</div>
