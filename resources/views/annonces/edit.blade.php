@extends('layouts.layout')

@section('content')

<section class="px-4 lg:px-32">
    <div class="container">
        <h1 class="text-center font-bold text-4xl mb-10">{{ $annonce->title }}</h1>

        <p class="mb-2 text-lg"><span class="font-bold">Auteur :</span> {{ $annonce->user->name }}</p>
           
        
        
        @auth
            <form action="{{ route('annonces.add') }}" method="post">
                @csrf

                <div class="mb-5">
                    <input type="text" name="title" placeholder="Titre..." class="p-2 border rounded w-full @error('title') border-red-500 @enderror" value="{{ $annonce->title }}">
    
                    @error('title')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-5">
                    <textarea name="body" cols="20" rows="10" class="p-2 border rounded w-full @error('body') border-red-500 @enderror">{{ $annonce->body }}</textarea>
    
                    @error('body')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-5">
                    <span class="font-bold">Catégorie : </span>
                    <select name="category_id" class="p-2">
                        @foreach ($categories as $cat)
                            <option @selected($cat->id == $annonce->category_id) value="{{ $cat->id }}">{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5 flex flex-col gap-2">
                    <button type="submit" class="w-full p-2 rounded bg-blue-500 hover:bg-blue-600 font-bold text-white uppercase">Éditer l'Annonce</button>
                </div>
    
            </form>

            <div class="mb-5 flex flex-col">
               

                @can('delete', $annonce)
                        <form action="{{ route('annonce.destroy', $annonce) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full uppercase bg-red-500 text-white font-bold rounded p-2">Supprimer l'Annonce</button>
                        </form>
                    @endcan
            </div>
        @endauth
               
            
    </div>
</section>


@endsection