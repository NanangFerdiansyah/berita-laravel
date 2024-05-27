@extends('layouts.master')

@section('title', 'View Users')

@section('content')
<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card mt-4">
            @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">{{ $item }}</div>
            @endforeach 
        @endif


        <div class="card-header">
            <h4>
                Edit user
                <a href="{{ url('admin/users')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
             <div class="mb-3">
                <label for="">Full Name</label>
                <p class="form-control">{{ $user->name }}</p>
             </div>

             <div class="mb-3">
                <label for="">Email</label>
                <p class="form-control">{{ $user->email }}</p>
             </div>

             <div class="mb-3">
                <label for="">Created At</label>
                <p class="form-control">{{ $user->created_at->format('d/m/y') }}</p>
             </div>

             <form action="{{ url('admin/update-user/'.$user->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Role as</label>
                    <select name="role_as" class="form-control">
                        <option value="">Select Role</option>
                        <option value="1" {{ $user->role_as == '1' ? 'selected':''}}>Admin</option>
                        <option value="0" {{ $user->role_as == '0' ? 'selected':''}}>User</option>
                    </select>
                   
                 </div>
                 <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </form>

        </div>
    </div>



</div>
@endsection