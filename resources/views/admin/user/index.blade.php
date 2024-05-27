@extends('layouts.master')

@section('title', 'View Users')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">


        <div class="card-header">
            <h4>
                View user
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
                        <th>Username</th>
                        <th>Email</th>  
                        <th>Role</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>                      
                        <td>{{ $item->role_as == '0' ? 'Admin' : 'User' }}</td>
                        <td>
                            <a href="{{ url('admin/user/'.$item->id) }}" class="btn btn-sm btn-success "><i class="fa-solid fa-pen-to-square"></i></a>
                            
                        </td>
                        
                           
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>
@endsection

 