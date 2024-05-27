@extends('layouts.master')

@section('title', 'View Post')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">


        <div class="card-header">
            <h4>
                View Post
                <a href="{{ route('add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
            
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
      
            <table id="myDataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>  
                        {{-- <th>Description</th> --}}
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <td>{{ $item->description }}</td> --}}
                        <td>
                            <img src="{{ asset('uploads/post/'.$item->image) }}" alt="image" width="50px" height="50px">
                        </td>
                        <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                        <td>
                            <a href="{{ url('admin/post/'.$item->id) }}" class="btn btn-sm btn-success "><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('admin/delete-post/'.$item->id) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                        
                           
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>
@endsection

