@extends('layouts.app')

@section('title', 'Tag')
    


@section('content')
<div class="container my-5">
      <div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Tag List</h3>
          <a class="btn btn-success" href="{{ route('Tag.create') }}" role="button"
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
                  <th>Tag</th>
                  <th style="width: 100px">Action</th>
                  <th style="width: 100px">Delete</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($Tags as $Tag)
                <tr>
                  <td>{{ $Tag->id }}</td>
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $Tag->name }}</td>
                  <td>
                    <a
                      class="btn btn-primary btn-sm"
                      href="{{ route('Tag.edit', ['id' => $Tag->id]) }}"
                      role="button"
                      >Edit</a
                    >
                  </td>
                  <form method="POST" action="{{ route('Tag.delete', ['id' => $Tag->id]) }}">
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

