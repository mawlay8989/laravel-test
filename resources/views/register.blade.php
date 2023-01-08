@extends('layouts.layout')

@section('content')

<section class="px-4 lg:px-64">
    <div class="container mx-auto">
        <h1 class="text-center font-bold text-4xl mb-5">Inscription</h1>

        <form action="{{ route('register') }}" method="post">
            @csrf 

            <div class="mb-5">
                <input type="text" name="username" placeholder="Pseudo..." class="p-2 border rounded w-full @error('username') border-red-500 @enderror" value="{{ old('username') }}">

                @error('username')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="text" name="name" placeholder="Nom Complet..." class="p-2 border rounded w-full @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                @error('name')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="email" name="email" placeholder="Email" class="p-2 border rounded w-full @error('email') border-red-500 @enderror" value="{{ old('email') }}">

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
                <input type="password" name="password_confirmation" placeholder="Confirmation du Mot de Passe..." class="p-2 border rounded w-full @error('password_confirmation') border-red-500 @enderror">

                @error('password_confirmation')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <button type="submit" class="w-full p-2 rounded bg-blue-500 hover:bg-blue-600 font-bold text-white uppercase">S'Inscrire</button>
            </div>
        </form>
    </div>
</section>


@endsection