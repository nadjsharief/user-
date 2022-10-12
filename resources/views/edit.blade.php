@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update</div>

                <div class="card-body">
                    @if (Auth::user()->roles == 'super admin')
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            <form action="{{ route('admin.update') }}" method="POST">
                            <tr>
                            {{ csrf_field() }}
                                <td><input type="hidden" class="form-control" name="id" value="{{$users->id}}"/><input type="text" class="form-control" name="name" value="{{$users->name}}"/></td>
                                <td><input type="email" class="form-control" name="email" value="{{$users->email}}"/></td>
                                <td>
                                    <div class="col-md-6">
                                        <select name="roles" data-parsley-trigger="keyup">
                                        @if (Auth::user()->roles == 'super admin')
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        @elseif (Auth::user()->roles == 'admin')
                                        
                                            <option value="user">User</option>
                                            @else
                                        @endif
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <input type="button" name="submit" value="Update" class="btn btn-success mx-2">
                                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                                </td>
                                
                            </tr>
                            </form>


                        </table>
                    @elseif (Auth::user()->roles == 'admin')
                    <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            <form action="{{ route('admin.update') }}" method="POST">
                            <tr>
                            {{ csrf_field() }}
                                <td><input type="hidden" class="form-control" name="id" value="{{$users->id}}"/><input type="text" class="form-control" name="name" value="{{$users->name}}"/></td>
                                <td><input type="email" class="form-control" name="email" value="{{$users->email}}"/></td>
                                <td>
                                    <input type="button" name="submit" value="Update" class="btn btn-success mx-2">
                                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                                </td>
                                
                            </tr>
                            </form>


                        </table>
                    @else
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
