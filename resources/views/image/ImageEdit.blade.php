@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                {{-- {{ $image }} --}}
                <form action="{{ route('updateImage',$image->id) }}"method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Name Of Image</label>
                      <input type="text"value="{{ $image->title }}"required class="form-control"name='title' id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('title')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Upload Your Image</label>
                      <input type="file" class="form-control" name="image2" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <input type="hidden" class="form-control"value="{{ $image->image }}" name="old_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('image2')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Choose The Gallery</label>
                      {{-- <input type="text" value="{{ $image->gallery_id }}" class="form-control" name="gallery_id" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                      <select name="gallery_id" required id=""class="form-control">

                          <option value="{{$image->gallery_id}}">{{ $g->title }}</option>
                        @foreach ($gallery as $gallery)
                        <option value="{{ $gallery->id}}">{{ $gallery->title }}</option>
                        @endforeach
                     </select>
                     @error('gallery_id')
                     <div class="text-danger">{{$message}}</div>
                     @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Choose The Type</label>
                      {{-- <input type="text" value="{{ $image->gallery_id }}" class="form-control" name="gallery_id" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                      <select name="type" required id=""class="form-control">

                          <option value="{{$image->type}}">{{ $type->type }}</option>
                        @foreach ($t as $t)
                        <option value="{{ $t->id}}">{{ $t->type }}</option>
                        @endforeach
                     </select>
                     @error('type')
                     <div class="text-danger">{{$message}}</div>
                     @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Add Tag</label>
                      <input type="text" class="form-control"required name="tag" value="{{ $image->tag }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('tag')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Date Of Image</label>
                      <input type="date" class="form-control"required name="date" value="{{ $image->date }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('date')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Description </label>
                      <input type="text" class="form-control"required name="description" value="{{ $image->description }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('description')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
