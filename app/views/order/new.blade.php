@extends('layout')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>General information</h4></div>
			  <div class="panel-body">
				<address>
				  <strong>{{ $bakery->name }}</strong><br>
				  {{ $bakery->address }}<br>
				  <abbr title="Phone">P:</abbr> {{ $bakery->phone_number }}<br>
				  <a href="mailto:{{ $bakery->email }}">{{ $bakery->email }}</a><br>
				  <abbr title="Register">Register Number:</abbr> {{ $bakery->register_number }}
				</address>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Customer information</h4></div>
			  <div class="panel-body">
				<address>
				  <strong>Contact information.</strong><br>
				  {{ $customer->full_name }}<br>
				  <abbr title="Phone">P:</abbr> {{ $customer->phone_number }}<br>
				  <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a><br>
				  <abbr title="Register">Register Number:</abbr> {{ $customer->register_number }}
				</address>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Seller Information</h4></div>
			  <div class="panel-body">
				<address>
				  <strong>Contact information.</strong><br>
				  {{ $user->full_name }}<br>
				  <abbr title="Phone">P:</abbr> {{ $user->phone_number }}<br>
				  <a href="mailto:{{ $customer->email }}">{{ $user->email }}</a><br>
				  <abbr title="charge">Charge:</abbr> {{ $user->user_type }}
				</address>
			  </div>
			</div>
		</div>

	</div>

			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Order information</h4></div>
			  <div class="panel-body">

				{{ Form::open(['route' => 'order/save', 'method' => 'POST', 'role' => 'form']) }}

				<fieldset>

				{{ form::hidden('id', $customer->id) }}

				{{ Field::date('delivery_date') }}

				{{ Field::date('billing_date') }}

				{{ Form::label('number', 'Purchase Order Number') }}
				
				{{ Form::text('number', null, ['class' => 'form-control' ] ) }}

				{{ Field::textarea('delivery_address',$customer->delivery_address) }}

				{{ Field::textarea('note') }}



				</fieldset>

				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<a href="{{ route('customers') }}" class="btn btn-primary"> Go Back </a>
				</div>

				{{ Form::close() }}

			  </div>
			</div>

			
</div>
@endsection