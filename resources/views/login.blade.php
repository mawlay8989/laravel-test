@extends('layouts.layout')

@section('content')

<section class="px-4 lg:px-64">
    <div class="container mx-auto">
        <h1 class="text-center font-bold text-4xl mb-5">Connexion</h1>

        @if (session('status'))
                <div class="bg-red-500 p-2 mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

        <form action="{{ route('login') }}" method="post">
            @csrf 

            <div class="mb-5">
                <input type="email" name="email" placeholder="Email..." class="p-2 border rounded w-full @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="password" name="password" placeholder="Mot de Passe..." class="p-2 border rounded w-full @error('password') border-red-500 @enderror">

                @error('password')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <button type="submit" class="w-full p-2 rounded bg-blue-500 hover:bg-blue-600 font-bold text-white uppercase">Se Connecter</button>
            </div>
        </form>
    </div>
</section>


@endsection