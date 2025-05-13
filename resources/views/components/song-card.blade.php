<div class="col-sm-2">
    <div class="card ">
        <img class="card-img-top" src="{{asset('storage/'.$song->cover_image)}}" alt="Title" />
        <div class="card-body">
            <h4 class="card-title">{{$song->title}}</h4>
            <p class="card-text">{{Str::limit($song->genre,7)}}</p>
            
               <a href="{{route('songs.show',$song->id)}}" class="stretched-link"></a>
            
            
        </div>
        <div class="card-foot border-top bg-light px-3 py-3" style="z-index: 9">
            <form action="{{route('songs.destroy',$song->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm float-end">
                    Delete
                </button>
            </form>
            <form action="{{route('songs.edit',$song->id)}}" method="GET">
                @csrf
                <button class="btn btn-primary btn-sm float-end mx-2">Edit</button>
            </form>
        </div>
    </div>
</div>
