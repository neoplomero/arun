@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">


			<p>

				{{ Form::open(['route' => 'users/create', 'method' => 'POST', 'role' => 'form']) }}

				<legend> New user </legend>

				<fieldset>
				
				
				{{ Field::text('full_name') }}

				{{ Field::email('email') }}

				{{ Field::select('user_type', $types) }}

				{{ Field::text('address') }}

				{{ Field::text('phone_number') }}

				{{ Field::text('register_number') }}

				{{ Field::text('bank_account') }}
				</fieldset>

				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<a href="{{ route('users') }}" class="btn btn-primary"> Go Back </a>
				</div>

				{{ Form::close() }}
			</p>


		</div>
	</div>
</div>


@endsection