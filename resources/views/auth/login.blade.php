@extends('layouts.app')

@section('content')
    <div class="w-full flex flex-col items-center justify-center gap-32">
        <x-card class="flex flex-col items-center justify-center gap-8 w-1/3 py-12">
            <form method="POST" action="{{ route('login.post') }}" class="flex flex-col gap-4 justify-center items-center">
                @csrf
                <!-- Email Address -->
                <div class="flex flex-col gap-4">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username">
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-4">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password">
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn__primary">Connexion</button>
                </div>
            </form>
        </x-card>
    </div>
@endsection
