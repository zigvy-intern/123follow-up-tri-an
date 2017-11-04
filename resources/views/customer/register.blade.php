<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">>
	<title>Register Travel-management</title>
  <link rel="stylesheet" href="source/css/login.css">
	<link rel="stylesheet" href="source/css/bootstrap.min.css">
  <script src="source/js/jquery-3.2.1.min.js"></script>
	<script src="source/js/bootstrap.min.js"></script>
	

	
</head>
<body>
	<div class="container"> 
 		<h1 class="text-center">Travel Management</h1> 
 		<div class="row"> 
  			<div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4"> 
			    <legend><a href="{{route('register')}}"><i class="glyphicon glyphicon-globe"></i></a> Register</legend> 
   				<form action="{{route('register')}}" method="POST" class="beta-form-checkout" > 
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @include('admin.errors.error')
            @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
     					<div>
                <!-- <label for="name">Your name </label> -->
                <input class="form-control" name="name" id="name" placeholder="Yourname" type="text"> 
     					</div> 
    					<div> 
                <!-- <label for="email">Email </label> -->
                <input class="form-control" name="email" id="email" placeholder="Your email" type="email"> 
    					</div> 
              <div>
                <!-- <label for="password">Password </label> -->
                <input class="form-control" name="password" id="password" placeholder="Password" type="password"> 
              </div>
              <div>
                <!-- <label for="re_password"></label>  -->
                <input class="form-control" name="re_password" placeholder="Retype Password" type="password"> 
              </div>   		

    				<button class="btn btn-block btn-success btn-rad btn-lg" type="submit"> Register </button>
   				</form> 
  			</div> 
 		</div>
		</div>
</body>
</html>