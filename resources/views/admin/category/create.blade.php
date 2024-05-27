@extends('layouts.master')

@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Category</h1>
        </div>
        <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger">{{ $item }}</div>
                @endforeach 
            @endif

            <form action="{{ url('admin/add-category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
               
                <div class="mb-3">
                    <label for="name">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <div class="mb-3">
                    <label for="name">Description</label>
                    <textarea name="description" id="mySummernote" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="name">Image</label>
                    <input type="file" required class="form-control" name="image">
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="name">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title">
                </div>
                <div class="mb-3">
                    <label for="name">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="name">Meta Keyword</label>
                    <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="col-md-3 mb-3">
                    <label for="name">Navbar Status</label>
                    <input type="checkbox" name="navbar_status">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
               
            </form>

        </div>
    </div>

</div>
@endsection