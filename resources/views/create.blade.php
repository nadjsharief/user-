@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new user</div>

                <div class="card-body">
                    <form   id="validate_form">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter  Name" required data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup" />
                               
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" data-parsley-trigger="keyup" name="email" required data-parsley-type="email" data-parsley-trigger="keyup" >

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required data-parsley-length="[8,16]" data-parsley-trigger="keyup" />
     
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required data-parsley-equalto="#password" data-parsley-trigger="keyup" />
     </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end" required>User Role</label>

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
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" />
     
                                <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){

 $('#validate_form').parsley();

 $('#validate_form').on('submit', function(event){
  event.preventDefault();

  if($('#validate_form').parsley().isValid())
  {
   $.ajax({
    url: '{{ route("admin.store") }}',
    method:"POST",
    data:$(this).serialize(),
    dataType:"json",
    beforeSend:function()
    {
     $('#submit').attr('disabled', 'disabled');
     $('#submit').val('Submitting...');
    },
    success:function(data)
    {
     $('#validate_form')[0].reset();
     $('#validate_form').parsley().reset();
     $('#submit').attr('disabled', false);
     $('#submit').val('Submit');
     alert(data.success);
    }
   });
  }
 });

});
</script>