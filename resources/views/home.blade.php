@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Auth::user()->roles == 'admin')
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
    <td><a href="{{ route('admin.edit', ['id'=>$users->id]) }}">update</a> delete</td>
</tr>
@endforeach
</table>
                        </div>
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
