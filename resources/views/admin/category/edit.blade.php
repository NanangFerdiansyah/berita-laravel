@extends('layouts.master')

@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Edit Category</h1>
            <a href="{{ url('admin/category') }}" class="btn btn-danger float-end">Back</a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger">{{ $item }}</div>
                @endforeach 
            @endif

            <form action="{{ url('admin/update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>
               
                <div class="mb-3">
                    <label for="name">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                </div>
                <div class="mb-3">
                    <label for="name">Description</label>
                    <textarea name="description" rows="5" class="form-control" >{{ $category->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="name">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="name">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}">
                </div>
                <div class="mb-3">
                    <label for="name">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $category->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="name">Meta Keyword</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{ $category->meta_keyword }}</textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="col-md-3 mb-3">
                    <label for="name">Navbar Status</label>
                    <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked' : '' }}>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
               
            </form>

        </div>
    </div>

</div>
@endsection