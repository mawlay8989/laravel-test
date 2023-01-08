@extends('layouts.layout')

@section('content')

<section class="px-4 lg:px-32">
    <div class="container">
        <h1 class="text-center font-bold text-4xl mb-10">Liste des Annonces</h1>

        @if ($annonces->count())
            @foreach ($annonces as $post)
                <div class="mb-10">
                    <div class="mb-2 text-xl">
                        <a href="{{ route('annonces.show', $post->id) }}" class="font-bold text-blue-500 hover:underline">{{ $post->title }}</a>
                    </div>

                    <p class="mb-2 text-lg"><span class="font-bold">Auteur :</span> {{ $post->user->name }}</p>

                    <div class="mb-8 text-base">
                       <span class="font-bold">Categorie :</span> {{ $post->category->nom }}
                    </div>

                    <div class="mb-5">
                        {{ $post->body }}
                    </div>

                    <div class="flex gap-2">
                        @can('edit', $post)
                            <a class="p-2 bg-blue-500 text-white font-bold rounded" href="{{ route('annonces.edit', $post) }}">Éditer</a>
                        @endcan
                    
                        @can('delete', $post)
                            <form action="{{ route('annonce.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-bold rounded p-2">Supprimer</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        @else
            <p>Il n'y a pas d'annonces</p>
        @endif
    </div>
</section>


@endsection