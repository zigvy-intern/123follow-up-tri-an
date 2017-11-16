<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>Bootstrap </title>
	<link rel="stylesheet" href="/source/css/bootstrap.min.css">
	<link rel="stylesheet" href="/source/css/style.css">
	<link rel="stylesheet" href="/source/css/reset.css">
	<link rel="stylesheet" href="/source/css/profile.css">
	<script src="/source/js/jquery-3.2.1.min.js"></script>
	<script src="/source/js/bootstrap.js"></script>
	<script src="/source/js/api.js"></script>
	<script src="https://use.fontawesome.com/931fc10468.js"></script>
	<script src="/source/js/ckeditor/ckeditor.js"></script>
	<script src="/source/js/ckfinder/ckfinder.js"></script>
</head>
<body>
	<div class="container container-max">
		@include('header')

		@yield('content')

		@include('footer')
	</div>

</body>
</html>
