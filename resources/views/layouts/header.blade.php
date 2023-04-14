<header class="bg-gray-100 flex items-center py-12 px-8">
    <div class="flex w-full justify-center items-center">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="shrink-0 flex-1 items-center w-12">
            <img class="ml-20 w-24" src="{{ asset('img/coupon.png') }}" alt="Logo coupon">
        </a>
        <x-card class="flex-auto bg-white">
            <ul class="flex gap-4 text-xl w-full justify-between">
                <a class="pb-2 border-b border-customRed" href="{{ route('subject.index', 'food') }}">Alimentaire</a>
                <a class="pb-2 border-b border-customGreen" href="{{ route('subject.index', 'tech') }}">High-tech</a>
                <a class="pb-2 border-b border-customOrange" href="{{ route('subject.index', 'trips') }}">Voyages</a>
                <a class="pb-2 border-b border-customBlue" href="{{ route('subject.index', 'fun') }}">Loisirs</a class="border-b-2 border-customBlue">
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
