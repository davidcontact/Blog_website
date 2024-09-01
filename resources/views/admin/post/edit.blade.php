@extends('layouts.app')

@section('title', 'Category Edit')
    

@section('content')
<div class="container my-5">
    <div class="row">
      <div class="d-flex justify-content-between mb-2">
        <h3>Create Post</h3>
        <a class="btn btn-success" href="{{ route('Post')}}" role="button">Back</a>
      </div>
      <!-- Blog entries-->
      <div class="col-lg-12">
        <div class="card p-3">
          <form method="POST" action="{{ route('Post.update', ['id' => $posts->id]) }}">
            @method("PUT")
            @csrf
            <div class="mb-3">
              <img src="{{ asset($posts->photo) }}" width="300" height="300" class="img img-resonsive">
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ $posts->title }}"
              />
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <textarea
                class="form-control"
                id="content"
                name="content"
                rows="5"
                
              >{{ $posts->content }}</textarea>
            </div>
            {{-- <div class="mb-3">
              <label for="thumbnail" class="form-label"
                >Choose Thumbnail</label
              >
              <input
                class="form-control"
                type="file"
                id="thumbnail"
                name="thumbnail"
              />
            </div> --}}
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select
                class="form-select"
                name="category"
                aria-label="Default select example"
              >
              <option selected>{{ $posts->category_id}}</option>

              @foreach ( $post1 as $post )
                <option value="{{ $post->name }}">{{ $post->name }}</option>
              @endforeach
                
              </select>
            </div>
            <div class="mb-3">
              <label for="tags" class="form-label">Status</label>
              <div class="tag-wrapper">
                  <select
                    class="form-select"
                    name="tags"
                    aria-label="Default select example"
                  >
                  <option selected>{{ $posts->tag}}</option>
                  @foreach ($tag as $tags)
                    <option value="{{ $tags->name }}">{{ $tags->name }}</option>
                    @endforeach                
                  </select>                
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection