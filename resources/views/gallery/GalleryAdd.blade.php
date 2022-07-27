@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <form action="{{ route('storeGallery') }}"method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">The Name Of Gallery</label>
                        <input type="text" class="form-control"name="title" id="exampleInputEmail1"required aria-describedby="emailHelp">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Cover Of Gallery </label>
                      <input type="file"required class="form-control" name="cover" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('cover')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tag</label>
                      <input type="text"required class="form-control" name="tag" id="exampleInputPassword1">
                      @error('tag')
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
