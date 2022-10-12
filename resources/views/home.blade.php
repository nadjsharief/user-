@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Auth::user()->roles == 'super admin')
                        <div class="alert alert-success" role="alert">
                        <table><a href="{{ route('admin.create') }}">add user</a>
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
                    <div class="alert alert-success" role="alert">
                        <table><a href="{{ route('admin1.create') }}">add user</a>
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
