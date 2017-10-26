<header>
	<div class="row header-top">
		<div class="col-xs-4 col-sm-4 col-md-7 logo" >
			<h1><a href="#"><img src="#"></a></h1>
		</div><!--logo-->
		<nav class="col-xs-8 col-sm-8 col-md-5 header-menu navbar navbar-default" role="navigation">
			<div class="navbar-header">
	      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
		        <span class="sr-only"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      		</button>
	     	<!-- <a class="navbar-brand" href="#">Dashboard</a> -->
	   		</div>
	   		<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav navbar-right">
					<td align="right">HELLO {{Auth::user()->name}} | <a href="{{route('logout')}}"> LOG OUT</a></td>
				</ul>
			</div>
		</nav><!--end header-menu -->
	</div><!-- end header-top -->
</header><!-- end header -->
<section>
	<div id = "corporation">
		<div class="row corporation-list-btn">
			<div class="col-xs-3 corporation-btn"><a class="btn button " href="{{route('accountSetting')}}"><i class="glyphicon glyphicon-home"></i><span> Accout Setting </span></a></div>
			<div class="col-xs-3 corporation-btn"><a class="btn button" href="#"><i class="glyphicon glyphicon-user"></i><span> Agency</span></a></div>
			<div class="col-xs-3 corporation-btn"><a class="btn button" href="#"><i class="glyphicon glyphicon-book"></i><span>  Booking Tour</span></a></div>
			<div class="col-xs-3 corporation-btn"><a class="btn button" href="#"><i class="glyphicon glyphicon-phone-alt"></i><span> Contacts</span></a></div>
		</div>
	</div>
</section>
