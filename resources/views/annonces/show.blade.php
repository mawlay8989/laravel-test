@extends('layouts.layout')

@section('content')

<section class="px-4 lg:px-32">
    <div class="container">
        <h1 class="text-center font-bold text-4xl mb-10">{{ $annonce->title }}</h1>

        <p class="mb-2 text-lg"><span class="font-bold">Auteur :</span> {{ $annonce->user->name }}</p>
        <div class="mb-8 text-base">
            <span class="font-bold">Categorie :</span> {{ $annonce->category->nom }}
         </div>
           
        @can('delete', $annonce)
            <form action="{{ route('annonce.destroy', $annonce) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white font-bold rounded p-2">Delete</button>
            </form>
        @endcan
                    

                    <div class="mb-5 text-xl">
                        {{ $annonce->body }}
                    </div>
               
            
    </div>
</section>


@endsection