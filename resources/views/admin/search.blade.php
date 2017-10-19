@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Searching</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($user)}} User found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($user as $newuser)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-body">
											<p class="single-item-name">{{$newuser->name}}</p>
											<p class="single-item-email">{{$newuser->email}}</p>
										</div>
								</div>
							@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
	    </div> <!-- .main-content -->
		</div> <!-- #content -->
  </div>
</div>
@endsection
