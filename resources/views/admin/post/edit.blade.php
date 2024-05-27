@extends('layouts.master')

@section('title', 'Edit Post')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
      
    
        <div class="card-header">
            <h4>
                Edit Post
                <a href="{{ url('admin/post') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">{{ $item }}</div>
            @endforeach 
        @endif
        
            <form action="{{ url('admin/update-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title">Category</label>
                    <select name="category_id"  class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'selected' : '' }}>{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" value="{{ $post->name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $post->slug }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Description</label>
                        <textarea name="description" rows="4" id="mySummernote"  class="form-control">{!! $post->description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name">Image</label>
                        <input type="file" class="form-control"  name="image">
                    </div>
                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label for="name">Meta Title</label>
                        <input type="text" class="form-control"  name="meta_title" value="{{ $post->meta_title }}">
                    </div>
                    <div class="mb-3">
                        <label for="name">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{!! $post->meta_description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"> {!! $post->meta_keyword !!}</textarea>
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
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
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

