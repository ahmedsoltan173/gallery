<html>
    <head>
                <link rel="stylesheet" href="{{asset('css/style.css')}}">

    </head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <img src="{{asset('image/gallery/'.$gallery->cover) }}" width="100" height="100" alt="..." class="img-thumbnail">
                <form method="POST" action="{{ route('updateGallery', $gallery->id ) }}"enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">The Name Of Gallery</label>
                      <input type="text" class="form-control"name="title"value='{{ $gallery->title }}'  id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('title')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Cover Of Gallery </label>
                      <input type="file" class="form-control" name="cover" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('cover')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                      <input type="hidden" class="form-control" name="old_cover"value='{{ $gallery->cover }}' id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Tag</label>
                      <input type="text" class="form-control" name="tag"value='{{ $gallery->tag }}' id="exampleInputPassword1">
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
</body>
</html>