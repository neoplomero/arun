@extends('layout')

@section('content')


<div class="container">

<div class="panel panel-default">
  <div class="panel-heading"><h4>User information</h4></div>
  <div class="panel-body">

	<address>
	  <strong>{{ $user->full_name }} ({{ $user->user_type }})</strong><br>
	  <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
	</address>

	<address>
	  <strong>Payment information.</strong><br>
	  <abbr title="register">Register:</abbr> {{ $user->register_number }}<br>
	  <abbr title="bank">Bank:</abbr> {{ $user->bank_account }}<br>
	  
	</address>

    <address>
	  <strong>Contact information.</strong><br>
	  {{ $user->address }}<br>
	  <abbr title="Phone">P:</abbr> {{ $user->phone_number }}
	</address>

	
  </div>
  <div class="panel-footer">

	<div class="">
		<a href="{{ route('users/account', [$user->id]) }}" class="btn btn-warning">Edit profile</a>
		<a href="{{ route('users') }}" class="btn btn-primary"> Go Back</a>
	</div>

  </div>
</div>

</div>

@stop

