@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 login-container">

			<div class="panel panel-default">
			<div class="panel-body">
				<p>

					{{ Form::open(['route' => 'login', 'method' => 'POST', 'role' => 'form'])}}
		            @if(Session::has('login_error'))
		              <span class="label label-danger">Credenciales no validas</span>
		            @endif

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