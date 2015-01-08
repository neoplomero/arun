@extends('layout')

@section('content')



<div class="container">

	<div class="panel panel-default">

		<div class="panel-body">
			<p>
				<strong>Are you sure that you want to delete this item ?</strong>
			</p>
		</div>
		<div class="panel-footer">
			<a href="{{ route('report/generate') }}" class="btn btn-danger">Cancel</a>
			<a href="{{ route('report/generate/delete', [$id]) }}" class="btn  btn-success">Continue</a>
		</div>

	</div>

</div>
@stop