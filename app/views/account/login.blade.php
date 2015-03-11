@extends('layout')

@section('content')

<div class="container">

	@if(Session::has('login_error'))
		<div class="alert alert-danger" role="alert">
			Please check your credentials, thanks.
		</div>

    @endif

	<div class="row">
		<div class="col-md-6 col-md-offset-3 login-container">

			<div class="panel panel-default">
			<div class="panel-body">
				<p>

					{{ Form::open(['route' => 'login', 'method' => 'POST', 'role' => 'form'])}}
					<legend> Login  </legend>

					<fieldset>

					{{ Field::email('email') }}

					{{ Field::password('password') }}

					<div class="checkbox">
		              <label class="remember-me">
		                {{ Form::checkbox('remember') }} Remember me
		              </label>
		            </div>


					</fieldset>

					<div class="">
						<input type="submit" value="Send" class="btn btn-success">

						<a href="{{ route('products') }}" class="btn btn-primary"> Cancel </a>
					</div>

					{{ Form::close() }}
				</p>
			</div>
			</div>
		</div>
	</div>
</div>


@endsection