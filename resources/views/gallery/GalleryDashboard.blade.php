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
            {{-- {{ $gallery }} --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($gallery as $gallery)
                    <tr>
                        <th scope="row">{{ $gallery->id }}</th>
                        <td>{{ $gallery->title }}</td>
                        <td><img src="{{ asset('image/gallery/'.$gallery->cover) }}"width="50" height="50" alt=""></td>
                        <td>{{ $gallery->tag }}</td>
                        <td>
                            <a href="{{ route('editGallery',$gallery->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('deleteGallery',$gallery->id) }}"onclick="return confirm('Are you sure? \n If you confirm you will remove all the image in this gallery ...')" class="btn btn-danger">Delete</a>
                            <a href="{{ route('showGallery',$gallery->id) }}" class="btn btn-primary">View</a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ route('createGallery') }}" class="btn btn-primary ">Create New Gallery</a>

            </div>
    </div>
</div>
@endsection
