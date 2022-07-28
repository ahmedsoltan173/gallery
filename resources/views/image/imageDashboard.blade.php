@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- {{ $gallery }} --}}
            <form class="d-flex" style="    width: 24%;
            position: absolute;
            right: 25%;
            margin: -4px;" role="search" action="{{ route('SearchImage') }}" method="GET">
                <input class="form-control me-2"name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <br><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Date</th>
                    <th scope="col">Gallery</th>
                    <th scope="col">Type</th>
                    <th scope="col">Tag</th>
                    <th scope="col">description</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($images as $image)
                    <tr>
                        <th scope="row">{{ $image->id }}</th>
                        <td>{{ $image->title }}</td>
                        <td><img src="{{ asset('image/img/'.$image->image) }}"width="50" height="50" alt=""></td>
                        <td>{{ $image->date }}</td>
                        <td>
                            <?php
                            $im=$image->gallery_id;
                            $gallery=App\Models\Gallery::select('title')->where('id',$im)->get();

                            foreach ($gallery as $g) {}
                            ?>
                            {{ $g->title }}

                        </td>
                        <td>
                            <?php
                            $ty=$image->type;
                            $type=App\Models\Type::select('type')->where('id',$ty)->get();

                            foreach ($type as $t) {}
                            ?>
                            {{ $t->type}}

                        </td>
                        <td>{{ $image->tag }}</td>
                        <td>{{ $image->description }}</td>
                        <td>
                            <a href="{{ route('editImage',$image->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('deleteImage',$image->id) }}"onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

                        </td>
                        @empty
                        <div class="alert alert-info"> You Don't Have Image In This Gallery</div>
                    </tr>

                    @endforelse
                    </tbody>
                </table>
                <a href="{{ route('createImage') }}" class="btn btn-primary ">Create New Image</a>
        </div>
    </div>
    <div class="d-felx justify-content-center">
        {!! $images->links('pagination::bootstrap-5') !!}
    </div>
</div>

@endsection
