<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /** Liste des playlists de l’utilisateur connecté */
    public function index()
    {
        $playlists = Playlist::where('user_id', auth()->id())->get();
        return view('playlists.index', compact('playlists'));
    }

    /** Création d’une playlist (avec cover optionnelle) */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'cover' => 'nullable|image|max:2048',
        ]);

        $playlist            = new Playlist();
        $playlist->name      = $request->name;
        $playlist->user_id   = auth()->id();

        if ($request->hasFile('cover')) {
            $playlist->cover = $request->file('cover')
                                       ->store('playlists/covers', 'public');
        }

        $playlist->save();

        return redirect()
               ->route('playlists.index')
               ->with('success', 'Playlist created successfully!');
    }

    /** Afficher une playlist */
    public function show(Playlist $playlist)
    {
        $songs = \App\Models\Song::all();          // pour le <select>
        return view('playlists.show', compact('playlist', 'songs'));
    }

    /** Supprimer une playlist */
    public function destroy(Playlist $playlist)
    {
        abort_if(auth()->id() !== $playlist->user_id, 403);
        $playlist->delete();

        return redirect()
               ->route('playlists.index')
               ->with('success', 'Playlist deleted successfully.');
    }
    public function addSong(Request $request, Playlist $playlist)
{
    $request->validate([
        'song_id' => 'required|exists:songs,id',
    ]);

    $playlist->songs()->syncWithoutDetaching($request->song_id);

    return redirect()->back()->with('success', 'Song added to playlist!');
}
public function removeSong(Request $request, Playlist $playlist, Song $song)
{
    $playlist->songs()->detach($song->id);
    return back()->with('success', 'Chanson retirée de la playlist.');
}


}
