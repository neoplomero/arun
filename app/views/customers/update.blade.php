@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">


			<p>

				{{ Form::model($customer, ['route' => 'customers/update', 'method' => 'PUT', 'role' => 'form']) }}

				<legend> Edit customer information</legend>

				<fieldset>
				
				{{ Form::hidden('id', $customer->id ) }}
				
				{{ Field::text('full_name') }}

				{{ Field::email('email') }}

				{{ Field::text('register_number') }}

				{{ Field::text('phone_number') }}

				{{ Field::text('invoice_address') }}

				{{ Field::text('delivery_address') }}

				{{ Field::select('payment_period', $period) }}

				</fieldset>

				<div class="">
					<input type="submit" value="Update" class="btn btn-success">

					<a href="{{ route('customers') }}" class="btn btn-primary"> Go Back </a>
				</div>

				{{ Form::close() }}
			</p>


		</div>
	</div>
</div>


@endsection