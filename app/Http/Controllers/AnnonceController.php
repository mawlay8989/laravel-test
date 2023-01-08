<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Categorie;

class AnnonceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['add', 'store', 'destroy']);
    }
    
    public function index()
    {
        $posts = Annonce::latest()->get();

        return view('index', [
            'annonces' => $posts
        ]);
    }

    public function add()
    {
        $categories = Categorie::all();

        return view('annonces.ajouter', [
            'categories' => $categories,
        ]);
    }

    public function show(Annonce $post)
    {
        return view('annonces.show', [
            'annonce' => $post
        ]);
    }

    public function edit(Annonce $post)
    {
        $this->authorize('edit', $post);

        $categories = Categorie::all();

        return view('annonces.edit', [
            'annonce' => $post, 'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        Annonce::create([

        ]);
        // $request->only('title', 'body', 'category_id')

        return redirect()->route('home');
    }

    public function update(Request $request, Annonce $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        /* $post->update([
            'title' =>
        ]); */
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('home');
    }

    public function destroy(Annonce $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('home');
    }
}
