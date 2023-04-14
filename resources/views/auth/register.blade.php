@extends('layouts.app')

@section('content')
    <div class="w-full flex flex-col items-center justify-center gap-32">
        <x-card class="flex flex-col items-center justify-center gap-8 w-1/3 py-12">
            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4 justify-center items-center">
                @csrf
                <!-- Email Address -->
                <div class="flex flex-col gap-4">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username">
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />

                </div>

                <!-- Password -->
                <div class="flex flex-col gap-4">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>

                <!-- Password -->
                <div class="flex flex-col gap-4">
                    <label for="password_confirmation">Confirmation mdp</label>
                    <input type="password" name="password_confirmation">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn__primary">Inscription</button>
                </div>
            </form>
        </x-card>
    </div>
@endsection
