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
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>action</th>
                            </tr>
                            <tr>
                                @foreach($users as $users)
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td><a href="{{ route('admin.edit', ['id'=>$users->id]) }}">update</a> <a href="{{ route('admin.delete', ['id'=>$users->id]) }}">delete</a> </td>
                            </tr>
                                @endforeach
                        </table>
                    </div>
                    @elseif (Auth::user()->roles == 'admin')
                    <div class="d-flex justify-content-end">
                            <a class="btn btn-primary m-2 px-4" style="border-radius: 50px" href="{{ route('admin1.create') }}">
                                <span><i class="fa-solid fa-plus"></i></span> ADD USER</a>
                        </div>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>action</th>
                            </tr>
                            <tr>
                                @foreach($users as $users)
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td><a href="{{ route('admin1.edit', ['id'=>$users->id]) }}">update</a>  </td>
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
