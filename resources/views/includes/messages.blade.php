@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
		<strong> {{ Session::get ('success') }} </strong>
	</div>

@endif

@if (Session::has('delete'))

	<div class="alert alert-danger" role="alert">
		<strong> {{ Session::get ('delete') }} </strong> 
	</div>

@endif

@if (count ($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Error</strong>
		<ul>
			@foreach ($errors->all () as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ul>
	</div>

@endif