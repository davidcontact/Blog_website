@extends('layouts.app')

@section('title', 'Tag Create')
    

@section('content')
    <div class="container my-5">
        <div class="row">
        <div class="d-flex justify-content-between mb-2">
            <h3>Create Tag</h3>
            <a class="btn btn-success" href="{{ route('Tag') }}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
            <div class="card p-3">
            <form method="POST" action="{{ route('Tag.store') }}">
                @csrf
                <div class="mb-3">
                <label for="name" class="form-label">Tag</label>
                <input type="text" class="form-control @error('name')  is-invalid @enderror" id="name" name="name" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection