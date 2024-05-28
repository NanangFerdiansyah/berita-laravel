@extends('layouts.app')

@section('title', "Krinews Website")

@section('meta_description', "Krinews Website")

@section('meta_keyword', "Krinews Website")

@section('content')


<div class="py-4 ">
    <div class="row ml-2 mr-2">
        <div class="col-md-12">

            <div class="owl-carousel category-carousel owl-theme">
                @foreach ($all_categories as $all_cate_item)
                <div class="item">
                    <a href="{{ url('kategori/'.$all_cate_item->slug) }}" class="text-decoration-none">
                        <div class="card">
                            <img src="{{ asset('uploads/category/'.$all_cate_item->image) }}" class="card-img-top" alt="Image">
                            <div class="card-body">
                                <h5 class="card-title text-center text-dark">{{ $all_cate_item->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>

        @foreach ($all_posts as $all_post_item)
        <div class="col-lg-2 mt-5">
            <div class="card">
                @if ($all_post_item->category)
                <a href="{{ url('kategori/'.$all_post_item->category->slug.'/'.$all_post_item->slug) }}" class="text-decoration-none">
                    <img src="{{ asset('uploads/post/'.$all_post_item->image) }}" class="card-img-top img-thumbnail" alt="image">
                    <div class="card-body">
                        <div class="small text-muted">{{ $all_post_item->created_at->format('d-m-Y') }}</div>
                        <h5 class="card-title font-weight-bold text-dark  ">{{ $all_post_item->name }}</h5>
                        <div class="card-text-container">
                        <p class="card-text text-dark" id="card-text">{!! $all_post_item->description !!}</p>
                         </div>
                        <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('kategori/'.$all_post_item->category->slug.'/'.$all_post_item->slug) }}">Read more →</a>
                    </div>
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

