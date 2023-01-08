@extends('layouts.layout')

@section('content')

<section class="px-4 lg:px-32">
    <div class="container">
        <h1 class="text-center font-bold text-4xl mb-10">Ajouter une annonce</h1>

        @auth
            <form action="{{ route('annonces.add') }}" method="post">
                @csrf

                <div class="mb-5">
                    <input type="text" name="title" placeholder="Titre..." class="p-2 border rounded w-full @error('title') border-red-500 @enderror" value="{{ old('title') }}">
    
                    @error('title')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-5">
                    <textarea name="body" cols="20" rows="10" class="p-2 border rounded w-full @error('body') border-red-500 @enderror" value="{{ old('body') }}"></textarea>
    
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
                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <button type="submit" class="w-full p-2 rounded bg-blue-500 hover:bg-blue-600 font-bold text-white uppercase">Ajouter l'Annonce</button>
                </div>
    
            </form>
        @endauth
    </div>
</section>


@endsection