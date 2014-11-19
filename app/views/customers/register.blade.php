@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">


			<p>

				{{ Form::open(['route' => 'customers/create', 'method' => 'POST', 'role' => 'form']) }}

				<legend> New customer </legend>

				<fieldset>
				
				
				{{ Field::text('full_name') }}

				{{ Field::email('email') }}

				{{ Field::text('register_number') }}

				{{ Field::text('phone_number') }}

				{{ Field::text('invoice_address') }}

				{{ Field::text('delivery_address') }}

				</fieldset>

				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<a href="{{ route('customers') }}" class="btn btn-primary"> Go Back </a>
				</div>

				{{ Form::close() }}
			</p>


		</div>
	</div>
</div>


@endsection