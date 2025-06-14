<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Requests\SongRequest;
use Illuminate\Support\Facades\Cache;

class SongController extends Controller
{
    public function index(){
        $songs=Song::paginate(24);
        return view('song.index',compact('songs'));
    }


    public function show(Request $request){
       $id= $request->id;
       $song = Song::findOrFail($id);
       return view('song.show',compact ('song'));
      
    }

    public function create(){
        return view('song.create');
       
     }

     public function store(SongRequest $request){
        $formFields = $request->validated() ;
        // Hash/Cryptage
       $formFields['cover_image'] = $request->file('cover_image')->store('song_im','public');
      $formFields['file_path'] = $request->file('file_path')->store('song_file','public');
      
        
        // Insertion
        $song = Song::create($formFields);

        
        // Redirection
       return redirect()->route('songs.index')->with('success','The song has been added successfully ! ');
     }

        







     public function destroy(Song $song){
        $song->delete();
        return to_route('songs.index')->with('success','The song '.$song->title.' has been deleted successfully !');
     }
     public function edit(Song $song)
       {
         return view('song.edit',compact('song'));
         }      


         public function search(Request $request)
{
    $query = $request->input('query');

    $songs = Song::where('title', 'like', '%' . $query . '%')->paginate(10);

    return view('song.index', compact('songs'));
}




public function update(SongRequest $request, Song $song)
{
    $formFields = $request->validated();
    $this->handleFileUploads($request, $formFields);
    $song->fill($formFields)->save();

    return to_route('songs.edit', $song->id)->with('success', 'Your song has been updated successfully!');
}


    private function uploadImage(SongRequest $request,array &$formFields){
        unset($formFields['cover_image']);
        if($request->hasFile('cover_image')){
            $formFields['cover_image'] = $request->file('cover_image')->store('song','public');
        }
    }

     private function handleFileUploads(SongRequest $request, array &$formFields)
{
    unset($formFields['cover_image'], $formFields['file_path']);

    if ($request->hasFile('cover_image')) {
        $formFields['cover_image'] = $request->file('cover_image')->store('cover_images', 'public');
    }

    if ($request->hasFile('file_path')) {
        $formFields['file_path'] = $request->file('file_path')->store('songs', 'public');
    }
}

}
 