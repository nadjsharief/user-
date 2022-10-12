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
                                <th>Action</th>
                            </tr>
                            <form action="{{ route('admin.update') }}" method="POST">
                            <tr>
                            {{ csrf_field() }}
                                <td><input type="hidden" class="form-control" name="id" value="{{$users->id}}"/><input type="text" class="form-control" name="name" value="{{$users->name}}"/></td>
                                <td><input type="email" class="form-control" name="email" value="{{$users->email}}"/></td>
                                <td><input type="button" name="submit" value="Update" class="btn btn-success"></td>
                            </tr>
                            </form>


                        </table>
                    @elseif (Auth::user()->roles == 'user')
                    hi
                    @else
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
