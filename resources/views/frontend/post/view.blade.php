@extends('layouts.app')

@section('title', "$post->meta_title")

@section('meta_description', "$post->meta_description")

@section('meta_keyword', "$post->meta_keyword")

@section('content')
  
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h4 class="mb-0">{!! $post->name !!}</h4>
                </div>
                <div class="mt-3">
                    <h6>{{ $post->category->name}}</h6>
                    <h6 class="small text-muted" >Posted On: {{ $post->created_at->format('d-m-Y') }}</h6>
                </div>                


               

                <div class="card card-shadow mt-4">
                    <div class="card-body post-description">
                        <div class="card">
                            <img src="{{ asset('uploads/post/'.$post->image) }}" alt="Image" class="w-" height="300px">
                        </div>
                        
                        <div style="margin-top: 20px;"> <!-- Menambahkan margin-top -->
                            {!! $post->description !!}
                        </div>
                    </div>
                </div>
                


            </div>
            <div class="col-md-3">
                <div class="card card-shadow mt-4">
                    <div class="card-header">
                        <h5 class="card-title">Latest Posts</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($latest_post as $latest_post_item)

                      
                        <a href="{{ url('kategori/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug) }}" class="text-decoration-none">
                            <h6> {{ $latest_post_item->name }} </h6>
                        </a>   
                        @endforeach
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection