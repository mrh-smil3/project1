@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Title <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="post_title" value="{{ old('post_title') }}" />
            </div>
            <div class="mb-3">
                <label>Description <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="description" value="{{ old('description') }}" />
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" name="image" type="file" id="image" accept="image/*" value="{{ old('image') }}" />
              </div>
            
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('post.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection