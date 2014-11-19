@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">


			<p>

				{{ Form::model($product,['route' => 'products/update', 'method' => 'PUT', 'role' => 'form','novalidate']) }}

				<legend> Update product </legend>

				<fieldset>
				
				{{ Form::hidden('id', $product->id ) }}
				
				{{ Field::text('name') }}

				{{ Field::textarea('description') }}

				{{ Field::number('price') }}


				</fieldset>

				<div class="">
					<input type="submit" value="Update" class="btn btn-success">

					<a href="{{ route('products') }}" class="btn btn-primary"> Go Back </a>
				</div>

				{{ Form::close() }}
			</p>


		</div>
	</div>
</div>


@endsection