@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>User Management System</h3>
                </div>

                    <div class="card-body">
                        @if (Auth::user()->roles == 'super admin')
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary m-2 px-4" style="border-radius: 50px" href="{{ route('admin.create') }}">
                                <span><i class="fa-solid fa-plus"></i></span> ADD USER</a>
                        </div>

                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    @foreach($users as $users)
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td class="text-capitalize">{{$users->roles}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('admin.edit', ['id'=>$users->id]) }}">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span></a> 
                                        <a class="btn btn-danger" href="{{ route('admin.delete', ['id'=>$users->id]) }}">
                                            <span><i class="fa-solid fa-trash"></i></span></a> 
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        @elseif (Auth::user()->roles == 'user')
                        hi
                        @elseif (Auth::user()->roles == 'admin')
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary m-2 px-4" style="border-radius: 50px" href="{{ route('admin.create') }}">
                                <span><i class="fa-solid fa-plus"></i></span> ADD USER</a>
                        </div>

                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    @foreach($users as $users)
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td class="text-capitalize">{{$users->roles}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('admin.edit', ['id'=>$users->id]) }}">
                                            <span><i class="fa-solid fa-pen-to-square"></i></span></a> 
                                        <a class="btn btn-danger" href="{{ route('admin.delete', ['id'=>$users->id]) }}">
                                            <span><i class="fa-solid fa-trash"></i></span></a> 
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        @else
                        @endif
    
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
