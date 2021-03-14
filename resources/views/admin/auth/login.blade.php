
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('public/assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body style="background-color: #ADD8E6;">
    <div class="container">
      <!-- partial -->
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
               
                <!-- <img src="assets/img/logo-invoice.png" /> -->
            </div>
          </div>

         <div class="row ">
              <!-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif -->
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                 <!--  -->
                     
                            <div class="panel-body">
                                <form  action="{{url('api/login')}}" method="post">

                                  {!! csrf_field() !!}
                                  <div style = "font-size:14px; color:#cc0000; margin-top:50px"></div>
                                    <hr />
                                    <h5>Enter Email and Password to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="email" class="form-control" placeholder="Your email " name="email" required/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password" rquired/>
                                        </div>
                                    
                                     <input type="submit" value="Login Now" class="btn btn-primary ">
                                    <hr />
                                    
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>

    </div>
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
</body>
</html>