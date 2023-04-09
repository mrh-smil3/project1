@extends('layouts.app')

@extends('layouts.navbar')

@section('content')
<div class="container">
    
    <div class="row">
      @foreach($posts as $post)
        <div class="col-md-4">
          <div class="card">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="..." width="100" height="200" >
            <div class="card-body">
              <h5 class="card-title">{{ $post->post_title }}</h5>
              <p class="card-text">{{ $post->description }}</p>
              <p class="card-text">Created : {{ $post->created_at }}</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection