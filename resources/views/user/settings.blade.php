<x-master title="Settings">
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
    <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}">
            @error('name')
              <div class="text-danger">{{$message}}</div>  
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value="{{  old('email',$user->email) }}">
            @error('email')
            <div class="text-danger">{{$message}}</div>  
          @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control">{{  old('bio',$user->bio) }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Profile image</label>
            <input type="file" name="pfp" class="form-control">
          </div>
          <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">Edit</button>
          </div>
    </form>
</x-master>
