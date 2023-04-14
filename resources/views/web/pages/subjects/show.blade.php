@extends('layouts.app')

@section('content')
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h2 class="uppercase">Ajouter un commentaire</h2>

                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Fermer</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{ route('subject.comment', $subject) }}" method="POST">
                        @csrf

                        <div class="flex flex-col gap-8">
                            <div id="title" class="flex flex-col gap-1">
                                <label for="comment">Message</label>
                                <input id="comment" type="text" name="comment">
                            </div>
                            <button type="submit" class="btn__primary">Publier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-card class="flex flex-col justify-center items-center w-full gap-20 px-0 relative">
        <div class="w-1/6 h-1 {{ $subject->category == 'fun' ? 'bg-customBlue' : ($subject->category == 'food' ? 'bg-customRed' : ($subject->category == 'tech' ? 'bg-customGreen' : ($subject->category == 'trips' ? 'bg-customOrange' : 'bg-customGray'))) }}"></div>

        @if(Auth::user() and $subject->user_id === Auth::user()->id)
            <form method="POST" action="{{ route('subject.delete', $subject->id) }}">
                @csrf
                <input type="submit" class="absolute top-10 right-10 cursor-pointer delete-user text-red-600 underline" value="Supprimer">
            </form>
        @endif
        <section class="flex gap-20 w-full px-20 ">
            <div class="flex flex-col gap-4 w-1/4">
                <h1 class="text-4xl font-bold capitalize">{{ $subject->subject }}</h1>
                <div class="flex gap-2">
                    @if (Auth::user())
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="pink" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="lightblue" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-8 flex-auto justify-center items-center">
                <x-card class="w-1/3 flex justify-center items-center">
                    <input type="text" placeholder="URL / Code promo" class="border-0 text-center">
                </x-card>
                <x-card class="w-full flex justify-center items-center">
                    {{ $subject->content }}
                </x-card>
            </div>
        </section>
        <div class="border border-gray-100 border-1 w-full"></div>
        <section class="flex flex-col items-center justify-center w-full gap-8 px-20">
            <h3 class="font-bold text-xl">Commentaires</h3>
                @foreach($comments->sortByDesc('created_at') as $comment)
                    <x-card class="w-full flex flex-col gap-1 relative">
                        @if(Auth::user() and $comment->user_id === Auth::user()->id)
                            <form method="POST" action="{{ route('comment.delete', $comment->id) }}">
                                @csrf
                                <input type="submit" class="absolute top-10 right-10 cursor-pointer delete-user text-red-600" value="x">
                            </form>
                        @endif
                        <div class="w-full flex gap-4">
                            <p>{{ $comment->created_at->format('H:i') }}</p>
                            <p>{{ $comment->comment }}</p>
                        </div>
                        <p class="italic text-gray-600">{{ $comment->user->username }} - {{ $comment->created_at->format('d/m/Y') }}</p>
                    </x-card>

                @endforeach
        </section>
    </x-card>
@endsection
