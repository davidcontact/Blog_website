@extends('layouts.app')

@section('title', 'Post')
    

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="d-flex justify-content-between mb-2">
      <h3>Post List</h3>
      <a class="btn btn-success" href="{{ route('Post.create') }}" role="button"
        >Create</a
      >
    </div>
    <!-- Blog entries-->
    <div class="col-lg-12">
      <div class="card p-3">
        <table
          id="datatable"
          class="table table-striped"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Thumbnail</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th style="width: 100px">Action</th>
              <th style="width: 100px">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $post as $posts)
            <tr>
              <td>{{ $posts->id }}</td>
              <td>{{ $posts->user_id }}</td>
              {{-- <td>{{ $posts->users?->email }}</td> --}}
              <td>
                <img src="{{ asset($posts->photo) }}" width="50" height="50" class="img img-resonsive">
              </td>
              {{-- <td>{{ $posts->content }}</td> --}}
              <td>{{ $posts->title }}</td>
              <td>{{ $posts->category_id }}</td>
              <td>
                {{ $posts->tag }}
              </td>
              <td>
                <a
                  class="btn btn-primary btn-sm"
                  href="{{ route('Post.edit', ['id' => $posts->id]) }}"
                  role="button"
                  >Edit</a
                >
              </td>
              <form method="POST" action="{{ route('Post.delete', ['id' => $posts->id]) }}">
                @method("DELETE")
                @csrf
                <td>
                  <button
                    class="btn btn-danger btn-sm"
                    role="button"
                    >Delete</button
                  >
                </td>
              </form>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>User</th>
              <th>Thumbnail</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th style="width: 100px">Action</th>
              <th style="width: 100px">Delete</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection