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
                    <th scope="col">Type</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->type }}</td>

                        <td>
                            <a href="{{ route('editType',$type->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('deleteType',$type->id) }}"onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>

                        </td>
                        @empty
                        <div class="alert alert-info"> You Don't Have Type In This Gallery</div>
                    </tr>

                    @endforelse
                    </tbody>
                </table>
                <a href="{{ route('createType') }}" class="btn btn-primary ">Add New Type</a>
        </div>
    </div>
    <div class="d-felx justify-content-center">
        {!! $types->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
