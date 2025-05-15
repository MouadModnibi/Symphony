<x-master title="Mon Song"><h3>Edit song</h3>
    @if ($errors->any())
    <x-alert type="danger">
      <h6>Errors : </h6>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
      </x-alert>
    @endif
      <form method="POST" action="{{ route('songs.update',$song->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
              <label class="form-label">title</label>
              <input type="text" name="title" class="form-control" value="{{ old('title',$song->title) }}">
              @error('name')
                <div class="text-danger">{{$message}}</div>  
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Genre</label>
              <input type="text" name="genre" class="form-control" value="{{  old('genre',$song->genre) }}">
              @error('genre')
              <div class="text-danger">{{$message}}</div>  
            @enderror
            <div class="mb-3">
            <label class="form-label">Image cover</label>
            <input type="file" name="cover_image" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Song fiel</label>
            <input type="file" name="file_path" class="form-control">
          </div>
          <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">Edit</button>
          </div>
      </form>
  </x-master>