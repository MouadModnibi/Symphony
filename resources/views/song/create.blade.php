<x-master title="Create"><h3>Add Song</h3>
    @if ($errors->any())
  <x-alert type="danger">
    <h6>Errors : </h6>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
      @endforeach
    </ul>
    </x-alert>
  @endif
    <form method="POST" action={{route('store')}}  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text"name="title" class="form-control"/ value="{{ old('title') }}"/>
            @error('title')
              <div class="text-danger">{{$message}}</div>  
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Song_file</label>
            <input type="file"name="file_path" class="form-control" value="{{ old('file_path') }}"/>
            @error('file_path')
              <div class="text-danger">{{$message}}</div>  
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Genre</label>
            <input type="text"name="genre" class="form-control" value="{{ old('genre') }}"/>
            @error('genre')
              <div class="text-danger">{{$message}}</div>  
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="" class="form-label">Song_cover</label>
            <input type="file"name="cover_image" class="form-control"value="{{ old('cover_image') }}"/>
            @error('cover_image')
              <div class="text-danger">{{$message}}</div>  
            @enderror
        </div>
            <div class="d-grid">
        <button
            type="submit"
            class="btn btn-primary"
        >
            Add
        </button>
        
            </div>
    </form>
    
</x-master>