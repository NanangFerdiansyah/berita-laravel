@extends('layouts.master')

@section('title', 'Add Post')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        @if ($errors->any())
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger">{{ $item }}</div>
        @endforeach 
    @endif
    
        <div class="card-header">
            <h4>
                Add Post
                <a href="{{ url('admin/post/create') }}" class="btn btn-primary float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/add-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Category</label>
                    <select name="category_id"  class="form-control">
                        @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Description</label>
                        <textarea name="description" id="mySummernote" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name">Image</label>
                        <input type="file" class="form-control" name="image">
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
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                        <div class=" mb-3">
                         <label for="name">Status</label>
                         <input type="checkbox" name="status">
                         </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Post</button>
                            </div>
                         </div>
                        
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>



</div>
@endsection

