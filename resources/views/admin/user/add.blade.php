@extends('admin/layout/default')
@section('title', 'User-Add')
@section('content')

<div class="col-md-6 col-sm-6 col-xs-12">
	 
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Add User
                        </div>
                        <div class="panel-body">
                            <form action="{{ url('api/user/add') }}" method="post"  enctype="multipart/form-data" >
                            	 {!! csrf_field() !!}
                                <div class="form-group">
                                            <label>Enter Name</label>
                                            <input class="form-control" type="text" name="name" required ><span class="help-block">
                                            	
                                            </span>
                                     
                                        </div>
                                        
                                        
                                 <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="text" name="email" required>
                                    
                                        </div>
                                            <div class="form-group">
                                            <label>Enter Password</label>
                                            <input class="form-control" type="password" name="password" required><span class="help-block">
                                            	
                                            </span>
                                     
                                        </div>
                                <div class="form-group">
                                            <label>Confirm Password </label>
                                            <input class="form-control" type="password" required name="confirm_password">
                                        </span>
                                     
                                     
                                        <div class="form-group">
                                            <label>Enter Status</label>
                                            <input class="form-control" type="text" name="status" required  ><span class="help-block">
                                            
                                            </span>
                                     
                                        </div>
                                        
                                        <button class="btn btn-danger" type="submit" name="submit" value="submit">
                                                
                                                Register Now
                                            </button>
                                        <!-- errormessage -->

                                    </form>
                            </div>
                        </div>
                            </div>

</div>
@endsection