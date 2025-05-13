<x-master title="Songs"><h3 style="text-align: center;">Songs</h3>
   <div class="row my-5">
    @foreach ($songs as $song)
    <x-song-card :song="$song">
    </x-song-card> 
    @endforeach
</div>


{{$songs->links()}}

<x-musicplayer filePath="" title="" />

</x-master>