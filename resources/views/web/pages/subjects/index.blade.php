@extends('layouts.app')

@section('content')

    <div class="w-full flex flex-col items-center justify-center gap-32 mt-48">
        @if (Auth::user())
            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="fixed bg-white border border-black border-2 rounded-full w-24 h-24 absolute top-10 right-10 text-4xl" type="button">
                +
            </button>

            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h2 class="uppercase">Ajouter un sujet</h2>

                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-6 space-y-6">
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
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <x-card class="grid grid-cols-12 items-center justify-center gap-24 w-full py-12">

            @foreach(App\Models\Subject::all() as $subject)
                <a href="{{ route('subject.show', $subject->id) }}" class="col-span-4">
                    <x-card class="flex flex-col gap-8 items-center justify-center relative">
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
                </a>
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
