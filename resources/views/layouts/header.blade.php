<header class="bg-customGray flex items-center py-12 px-8">
    <div class="flex w-full justify-center items-center">
        <!-- Logo -->
        <div class="shrink-0 flex-1 items-center w-12">
            logo
        </div>
        <x-card class="flex-auto bg-white">
            <ul class="flex gap-4 text-xl w-full justify-between">
                <li>Épicerie & courses</li>
                <li>High-tech</li>
                <li>Voyages</li>
                <li>Divers</li>
            </ul>
        </x-card>
        <x-card>
            @if (Auth::user())
                <div class="flex flex-col gap-4">
                    {{ Auth::user()->username }}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" class="cursor-pointer delete-user underline" value="Déconnexion">
                    </form>
                </div>
            @else
                <div class="flex flex-col gap-4">
                    <a href="{{ route('register') }}" class="underline">Inscription</a>
                    <a href="{{ route('login') }}" class="underline">Connexion</a>
                </div>
            @endif
        </x-card>

    </div>
</header>
