@if (count($errors) > 0)
		<ul class="error-msg">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul> 
@endif