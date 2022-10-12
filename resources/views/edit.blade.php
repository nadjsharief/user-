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
                        <table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>action</th>
  </tr>
  <form action="{{ route('update') }}" method="POST">
  <tr>
  {{ csrf_field() }}
    <td><input type="hidden" name="id" value="{{$users->id}}"/><input type="text" name="name" value="{{$users->name}}"/></td>
    <td><input type="email" name="email" value="{{$users->email}}"/></td>
    <td><input type="button" name="submit" value="Submit" class="btn btn-primary"></td>
</tr>
</form>


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
