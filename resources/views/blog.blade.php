@extends('layouts.app')

@section('title', 'Blog-Artical')
    
@push('home-style')
<style>
 .text-item-header{
    color: red;
  }
  .title-item{
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 900;
  }
  .back-item{
    background-color: grey;  
    border-radius: 7px; 
    font-family: sans-serif; 
    font-weight: 900;
  }
  .back-item:hover{
    background-color: rgb(53, 53, 53);  
    color: white;
  }
</style>
   
@endpush

@section('content')
<!-- Page content-->
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8">
      <!-- Post content-->
      <article>
        <!-- Post header-->
        <header class="mb-4">
          <!-- Post title-->
          <h1 class="fw-bolder mb-1 text-item-header title-item"><a class="btn back-item"  href="{{ route('home') }}" role="button"><< </a> {{ $post->title }}</h1>
          <!-- Post meta content-->
          <div class="text-muted fst-italic mb-2">
            Posted on {{ $post->created_at->format('F d, Y')}} by {{ $post->user?->name }}
          </div>
          <!-- Post categories-->
          {{-- @foreach ($post->tag as $tags) --}}
          <a
          class="badge bg-secondary text-decoration-none link-light"
          href="#!"
          >{{ $post->tag }}</a
          >
          {{-- @endforeach --}}
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4">
          <img
            class="img-fluid rounded"
            src="{{ asset($post->photo) }}"
            alt="..."
          />
        </figure>
        <!-- Post content-->
        <section class="mb-5">
          <p class="fs-5 mb-4">
            {{ $post->content}}
          </p>
        </section>
      </article>
    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
      <!-- Search widget-->
      {{-- @include('components.search-form') --}}
      <!-- Tags widget-->
      {{-- @include('components.tag') --}}
    </div>
  </div>
</div>
@endsection
