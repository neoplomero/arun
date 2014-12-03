@extends('layout')

@section('content')


<div class="container">

	<div class="panel panel-default">
	  <div class="panel-heading"><h4>Customer information</h4></div>
	  <div class="panel-body">

		<address>
		  <strong>Contact information.</strong><br>
		  {{ $customer->full_name }}<br>
		  <abbr title="Phone">P:</abbr> {{ $customer->phone_number }}<br>
		  <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a><br>
		  <abbr title="Register">Register Number:</abbr> {{ $customer->register_number }}<br>
		  <strong>Payment period:</strong> {{ $customer->payment_period }}
		</address>

		<address>
		  <strong>Invoice address.</strong><br>
		  {{ $customer->invoice_address }}<br>
		</address>

		<address>
		  <strong>Delivery address.</strong><br>
		  {{ $customer->delivery_address }}<br>
		</address>

		
	  </div>
	  <div class="panel-footer">

		<div class="">
			<a href="{{ route('customers/account', [$customer->id]) }}" class="btn btn-warning">Edit Information</a>
			<a href="{{ route('customers') }}" class="btn btn-primary"> Go Back</a>

			<a href="{{ route('order', [$customer->id] ) }}" class="btn btn-success"> Generate order</a>

			<a href="{{ route('report/orders', [$customer->id] ) }}" class="btn btn-success"> History</a>
		</div>

	  </div>
	</div>

</div>

@stop

