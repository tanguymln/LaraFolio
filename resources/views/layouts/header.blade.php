<div x-data="{ open: false }" class="w-full">
    <!-- Desktop Header -->
    <div class="hidden sm:flex justify-between items-center px-6 py-4">
        <a href="/" class="flex items-center">
            @if ($siteLogo)
                <img src="{{ config('app.url') . '/' . $siteLogo }}" alt="{{ config('app.name') }}" class="w-16 h-16">
            @else
                <x-application-logo class="w-16 h-16 fill-current text-gray-800" />
            @endif
        </a>

        <ul class="flex lg:space-x-6 text-center">
            <li><a href="{{ route('about') }}" class="lg:py-2 lg:px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">À Propos</a></li>
            <li><a href="{{ route('services') }}" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Services</a></li>
            <li><a href="{{ route('quotes') }}" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Devis</a></li>
            <li><a href="{{ route('contact') }}" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Contact</a></li>
        </ul>

        <div class="flex items-center gap-2">
            <div class="relative">
                <input type="text" id="global-search" placeholder="Rechercher..."
                    class="w-full px-4 py-2 border rounded-full focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white">
                <ul id="search-results"
                    class="absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto hidden dark:bg-gray-900 dark:border-gray-700">
                </ul>
            </div>

            @auth
                <a href="{{ route('dashboard.index') }}" class="btn btn-white text-black dark:text-white bg-white dark:bg-gray-800">Dashboard</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="btn btn-white text-black dark:text-white bg-white dark:bg-gray-800">Connexion</a>
                @if (!$isRegistered)
                    <a href="{{ route('register') }}" class="btn border-none text-white bg-blue-500 hover:bg-blue-600">Inscription</a>
                @endif
            @endguest
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="flex sm:hidden justify-between items-center px-4 py-4">
        <a href="/">
            @if ($siteLogo)
                <img src="{{ config('app.url') . '/' . $siteLogo }}" alt="{{ config('app.name') }}" class="w-14 h-14">
            @else
                <x-application-logo class="w-14 h-14 fill-current text-gray-800" />
            @endif
        </a>

        <button @click="open = !open" class="focus:outline-none">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <nav x-show="open" class="sm:hidden px-4 pb-4 space-y-2">
        <ul class="flex flex-col text-center space-y-2">
            <li><a href="{{ route('about') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">À Propos</a></li>
            <li><a href="{{ route('services') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Services</a></li>
            <li><a href="{{ route('quotes') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Devis</a></li>
            <li><a href="{{ route('contact') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-800 rounded">Contact</a></li>
        </ul>

        <div class="mt-4 space-y-2">
            <input type="text" placeholder="Rechercher..."
                class="w-full px-4 py-2 border rounded-full focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white">

            @auth
                <a href="{{ route('dashboard.index') }}" class="block w-full text-center py-2 bg-gray-200 dark:bg-gray-700 rounded">Dashboard</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="block w-full text-center py-2 bg-gray-200 dark:bg-gray-700 rounded">Connexion</a>
                @if (!$isRegistered)
                    <a href="{{ route('register') }}" class="block w-full text-center py-2 bg-blue-500 text-white rounded">Inscription</a>
                @endif
            @endguest
        </div>
    </nav>
</div>
