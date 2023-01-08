<nav class="px-4 lg:px-32 bg-gray-900 py-4 text-white shadow mb-5">
    <ul class="flex gap-4">
        <li>
            <a href="{{ route('home') }}" class="hover:underline font-bold uppercase text-sm">
                Annonces
            </a>
        </li>

        @guest
            <li>
                <a href="{{ route('register') }}" class="hover:underline font-bold uppercase text-sm">
                    S'inscrire
                </a>
            </li>

            <li>
                <a href="{{ route('login') }}" class="hover:underline font-bold uppercase text-sm">
                    Se Connecter
                </a>
            </li>
        @endguest

        @auth
            <li>
                <a href="" class="hover:underline font-semibold uppercase text-sm text-red-300">{{ auth()->user()->name }}</a>
            </li>

            <li>
                <a href="{{ route('annonces.add') }}" class="hover:underline font-bold uppercase text-sm">
                    Poster une Annonce
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                        
                    <button type="submit" class="hover:underline font-bold uppercase text-sm">Se Déconnecter</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>