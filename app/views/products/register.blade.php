@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">


			<p>

				{{ Form::open(['route' => 'products/create', 'method' => 'POST', 'role' => 'form','novalidate']) }}

				<legend> New product </legend>

				<fieldset>
				
				
				{{ Field::text('name') }}

				{{ Field::textarea('description') }}

				{{ Field::number('price') }}


				</fieldset>

				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<a href="@{{ route('users') }}" class="btn btn-primary"> Go Back </a>
				</div>

				{{ Form::close() }}
			</p>


		</div>
	</div>
</div>


@endsection