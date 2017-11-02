<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login Travel-management</title>
	<link rel="stylesheet" href="source/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/css/login.css">
	<script src="source/js/ie-emulation-modes-warning.js"></script>
	<script src="source/js/ie10-viewport-bug-workaround.js"></script>
</head>
<body>
	<div class="container">

     	<form action="" method="POST" class="form-login" >
     		<input type="hidden" name="_token" value="{{csrf_token()}}">
     		@include('admin.errors.error')
        		<h2 class="form-login-heading">LOGIN</h2>
        			<input type="email" class="form-control" placeholder="Email" name="email">
       				<input type="password" class="form-control" placeholder="Password" name="password">
       			<label class="checkbox">
         		<input type="checkbox" value="remember-me"> Remember me </label>
        	<button class="btn btn-block btn-success btn-rad btn-lg" data-dismiss="modal"> Login</button>
      	</form>
    </div> <!-- /container -->
    <div class="text-center out-links"><a href="{{route('login')}}">&copy; 2017 Zigvy Corporation</a></div>
</body>
</html>
