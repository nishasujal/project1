@extends('admin/layout/default')
@section('title', 'User-Index')
@section('content')
<div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                           Edit User
                        </div>
                        <div class="panel-body">
                            <form method="post" action="{{ url('api/user/update') }}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                        <div class="form-group">
                                            <label>Enter Name</label>
                                            <input class="form-control" type="text" value="{{$user->name}}" name="name" required>
                                          
                                        </div>
<!-- editImage .-->

                                    
<!-- /editImage -->

                                 <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="email" value="{{$user->email}}" name="email">
                                     
                                        </div>
                                            
                                        <div class="form-group">
                                            <label>Change Status</label>
                                            <input class="form-control" type="text" value="{{ $user->status}}" name="status">
                                            
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info">UpdateUser </button>
                
                                    </form>
                            </div>
                        </div>
                            </div>

@endsection