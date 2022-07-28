<html>
    <head>
                <link rel="stylesheet" href="{{asset('css/style.css')}}">

    </head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <form action="{{ route('storeType') }}"method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Type Of Image</label>
                      <input type="text" class="form-control"name='type'required id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('type')
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