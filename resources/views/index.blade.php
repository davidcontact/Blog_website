@extends('layouts.app')

@section('title', 'Home Page')
 
@push('home-style')
<style>
  .img-page{
    height: 250px;
  }
  .post-item-content{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
            line-clamp: 2;
    -webkit-box-orient: vertical;
  }
</style>  
@endpush

@section('content')
<div class="container mt-5">
    <div class="row">
      <!-- Side widgets-->
      <div class="col-lg-4">
        <!-- Search widget-->
        @include('components.search-form')
        <!-- Tags widget-->
        {{-- @include('components.tag') --}}
      </div>
      <!-- Blog entries-->
      <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
          @if ($posts->count())
          @foreach ($posts as $post)
          {{-- <div class="col-lg-12">
            <!-- Featured blog post-->
            <div class="card mb-4">
              <a href=" {{ route('blog') }} "
                ><img
                  class="card-img-top"
                  src="{{ asset($post->photo) }}"
                  alt="..."
              /></a>
              <div class="card-body">
                <div class="small text-muted">January 1, 2024</div>
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">
                  {{ $post->content }}
                </p>
                <a class="btn btn-primary" href=" {{ route('blog') }} ">Read more →</a>
              </div>
            </div>
          </div> --}}
          <div class="col-lg-6">
            <!-- Blog post-->
            <div class="card mb-4">
              <a href=" {{ route('blog', ['id' => $post->id]) }} "
                ><img
                  class="card-img-top img-page"
                  src="{{ asset($post->photo) }}"
                  alt="..."
              /></a>
              <div class="card-body">
                <div class="small text-muted">{{ $post->created_at->format('F d, Y')}}</div>
                <h2 class="card-title h4">{{ $post->title }}</h2>
                <p class="card-text post-item-content">
                  {{ $post->content }}
                </p>
                <a class="btn btn-primary" href=" {{ route('blog', ['id' => $post->id]) }} ">Read more →</a>
              </div>
            </div>
          </div>
          @endforeach
          @else
            <h4>Search Data Not Found....!</h4>
          @endif
          
        </div>
        <!-- Pagination-->
        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection
