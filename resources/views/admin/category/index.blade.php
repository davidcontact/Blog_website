@extends('layouts.app')

@section('title', 'Category')
    

@section('content')
<div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Category List</h3>
          <a class="btn btn-success" href="{{ route('category.create') }}" role="button"
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
                  <th>Category</th>
                  <th style="width: 100px">Action</th>
                  <th style="width: 100px">Delete</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $category->name }}</td>
                  <td>
                    <a
                      class="btn btn-primary btn-sm"
                      href="{{ route('category.edit', ['id' => $category->id]) }}"
                      role="button"
                      >Edit</a
                    >
                  </td>
                  <form method="POST" action="{{ route('category.delete', ['id' => $category->id]) }}">
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
                  <th>Tag</th>
                  <th>Action</th>
                  <th>Delete</th>

                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection