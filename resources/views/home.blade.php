@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="">
                <div class="card-body"style="text-align: center;">
                  <h5 class="card-title" style="    margin-bottom: 50px;">Image Number</h5>
                  {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                  <a href="{{ route('dashboardImage') }}" class="card-body" style="font-size: 63px;
                  font-weight: bold;
                  text-decoration: none;
                  color: rgb(49, 46, 46);
                  text-align: center;
                  " >{{ $image }}</a>
                  {{-- <a href="#" class="card-link">Another link</a> --}}
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="">
                <div class="card-body" style="text-align: center;">
                  <h5 class="card-title" style="    margin-bottom: 50px;">Gallery Number</h5>
                  {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                  <a href="{{ route('dashboardGallery') }}" style="font-size: 63px;
                  font-weight: bold;
                  text-decoration: none;
                  color: rgb(49, 46, 46);
                  text-align: center;
                  " class="card-body">{{ $gallery }}</a>
                  {{-- <a href="#" class="card-link">Another link</a> --}}
                </div>
              </div>
        </div>

    </div>
</div>





@endsection
