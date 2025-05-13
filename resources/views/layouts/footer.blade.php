<div class="bg-blue-950 text-white pb-8 pt-32">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Logo / About -->
        <div>
            <h2 class="text-2xl font-bold mb-4">Mon Portfolio</h2>
            <p class="text-gray-400">Développeur web passionné, je crée des solutions modernes, performantes et sur mesure pour mes clients.</p>
        </div>

        <!-- Navigation -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Liens utiles</h3>
            <ul class="space-y-2 text-gray-300">
                <li><a href="{{ route('home') }}" class="hover:text-white">Accueil</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-white">Services</a></li>
                <li><a href="{{ route('quotes') }}" class="hover:text-white">Demander un devis</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Contact</h3>
            <ul class="text-gray-300 space-y-2">
                <li>Email : <a href="mailto:contact@tonsite.com" class="hover:text-white">contact@tonsite.com</a></li>
                <li>Téléphone : <span>+33 6 12 34 56 78</span></li>
                <li>Localisation : Paris, France</li>
            </ul>
        </div>
    </div>

    <div
        class="container mx-auto px-6 mt-12 border-t border-gray-700 pt-6 flex flex-col md:flex-row items-center justify-between text-sm text-gray-400">
        <p>&copy; {{ date('Y') }} Mon Portfolio. Tous droits réservés.</p>
        <div class="flex gap-4 mt-4 md:mt-0">
            <a href="#" class="hover:text-white">Mentions légales</a>
            <a href="#" class="hover:text-white">Politique de confidentialité</a>
        </div>
    </div>
</div>
