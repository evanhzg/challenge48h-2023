@extends('layouts.app')

@section('content')

<div class="flex flex-col w-full items-center justify-center gap-8">
    <h2>Ajouter un sujet</h2>

    <form action="submit" method="POST">
        <ul class="flex flex-col gap-4">
            <li id="title" class="flex flex-col gap-1">
                <label for="title">Titre</label>
                <input type="text">
            </li>
            <li id="title" class="flex flex-col gap-1">
                <label for="content">Article</label>
                <input type="text">
            </li>
            <button type="submit" class="btn__primary">Publier</button>
        </ul>
    </form>
</div>
@endsection
