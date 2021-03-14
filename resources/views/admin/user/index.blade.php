@extends('admin/layout/default')
@section('title', 'User-Index')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

                <div class="col-md-10">

                
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Users
                            <a href="{{url('api/addUser')}}"> <button class="btn btn-warning">   Add</button></a>
                        </div>

             
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th>Name</th>
                                            
                                            <th>Email</th>
                                            
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>

                                        @foreach($user as $user)
                                        <tr >
                                            <td><?php $i++ ;?>{{$i}}</td>
                                            <td>{{$user['name']}}</td>
                                            
                                            <td>{{$user['email']}}</td>
                                            
                                            <td>{{$user['status']}}</td>
                                            <td>
                                                <a href="{{action('Api\UsersController@getEdit',$user['id'])}}" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>Edit</a>
                                                <a href="{{action('Api\UsersController@userdelete',$user['id'])}}" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>Delete</a>
                                                {!! csrf_field() !!}
                                                 @method('DELETE') 
                                </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                
            </div>

@endsection
