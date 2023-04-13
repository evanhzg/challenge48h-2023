@extends('layouts.app')

@section('content')

<div class="w-full flex flex-col items-center justify-center">
    <x-card class="flex flex-col items-center justify-center gap-8 w-1/3 py-12">
    <h2>Ajouter un sujet</h2>
        <form action="{{ route('subject.create') }}" method="POST">
            @csrf

            <div class="flex flex-col gap-4">
                <div id="title" class="flex flex-col gap-1">
                    <label for="title">Titre</label>
                    <input id="title" type="text" name="title">
                </div>
                <div id="content" class="flex flex-col gap-1">
                    <label for="content">Article</label>
                    <input id="content" type="text" name="content">
                </div>
                <button type="submit" class="btn__primary">Publier</button>
            </div>
        </form>
    </x-card>

    <x-card class="flex flex-col items-center justify-center gap-8 w-1/3 py-12">
        @foreach(App\Models\Subject::all() as $subject)
            <div>
                {{ $subject->subject }}
            </div>
        @endforeach
    </x-card>
</div>
@endsection
