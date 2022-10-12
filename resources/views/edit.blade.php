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
                            
                            <tr>
                           
                                <td><input type="hidden" class="form-control" name="id" value="{{$users->id}}"/><input type="text" class="form-control" name="name" value="{{$users->name}}"/></td>
                                <td><input type="email" class="form-control" name="email" value="{{$users->email}}"/></td>
                                <td>
                                    <input type="button" javascript="(0)" onclick="updateuser(this);" class="btn btn-success mx-2">Update User</a>
                                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                                </td>
                                
                            </tr>
                           


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
<script>
 function updateuser(el) {
        // event.preventDefault();
      var id = $('#id').val();
      var name = $('#name').val();
      var email = $('#email').val();
     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route ('admin.update') }}",
            type: "GET",
            dataType: 'json',  
            data: {
                id: id
            },
            success: function(data) {
                $.each(data, function( index, value ) {
              alert("Sucessfully Update");
            });
            },
            error: function(data) {
                console.log(data);
            },
        });
    }
 <script>