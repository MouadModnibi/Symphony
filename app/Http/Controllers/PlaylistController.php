<?php

namespace App\Http\Controllers;

use App\Models\playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $playlists = auth()->user()->playlists()->with('songs')->get();
    $songs = \App\Models\Song::all();

    return view('playlists.index', compact('playlists', 'songs'));
}

public function store(Request $request)
{
    $request->validate(['name' => 'required|string|max:255']);

    auth()->user()->playlists()->create([
        'name' => $request->name,
    ]);

    return redirect()->back()->with('success', 'Playlist créée !');
}

public function addSong(Request $request, Playlist $playlist)
{
    $request->validate(['song_id' => 'required|exists:songs,id']);
    $playlist->songs()->attach($request->song_id);

    return redirect()->back()->with('success', 'Chanson ajoutée !');
}}
