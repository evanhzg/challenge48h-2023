@extends('layouts.app')

@section('content')

<div class="w-full flex flex-col items-center justify-center gap-32">
    <x-card class="flex flex-col items-center justify-center gap-8 w-1/3 py-12">
    <h2 class="uppercase">Ajouter un sujet</h2>
        <form action="{{ route('subject.create') }}" method="POST">
            @csrf

            <div class="flex flex-col gap-8">
                <div id="title" class="flex flex-col gap-1">
                    <label for="title">Titre</label>
                    <input id="title" type="text" name="title">
                </div>
                <div id="inner_content" class="flex flex-col gap-1">
                    <label for="inner_content">Article</label>
                    <input id="inner_content" type="text" name="inner_content">
                </div>
                <div class="flex flex-col gap-4">
                    <p>Catégorie</p>
                    <div class="flex items-center gap-3">
                        <input type="radio" name="category" value="food">
                        <label for="category">Alimentaire</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" name="category" value="tech">
                        <label for="category">Tech</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" name="category" value="trips">
                        <label for="category">Voyages</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" name="category" value="fun">
                        <label for="category">Loisirs</label>
                    </div>
                </div>
                <button type="submit" class="btn__primary">Publier</button>
            </div>
        </form>
    </x-card>

    <x-card class="grid grid-cols-12 items-center justify-center gap-24 w-full py-12">
        @foreach(App\Models\Subject::all() as $subject)
            <x-card class="col-span-4 flex flex-col gap-8 items-center justify-center relative">
                <div class="absolute w-3 h-3 top-4 left-4 rounded-full {{ $subject->category == 'fun' ? 'bg-customBlue' : ($subject->category == 'food' ? 'bg-customRed' : ($subject->category == 'tech' ? 'bg-customGreen' : ($subject->category == 'trips' ? 'bg-customOrange' : 'bg-customGray')))}}"></div>
                <form method="POST" action="{{ route('subject.delete', $subject->id) }}">
                    @csrf
                    <input type="submit" class="absolute top-4 right-4 cursor-pointer delete-user" value="x">
                </form>
                <h3>
                    {{ $subject->subject }}
                </h3>
                <p>
                    {{ $subject->content }}
                </p>
            </x-card>
        @endforeach
    </x-card>
</div>
@endsection

<script>
    deleteButton = document.querySelector('.delete-user')

    deleteButton.addEventListener('click', (e) => {
        e.preventDefault();
        if (confirm('Confirmer la suppression ?')) {
            (e.target).closest('form').submit()
        }
    });
</script>
