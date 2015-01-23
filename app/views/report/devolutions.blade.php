@extends('layout')

@section('content')

	<div class="container">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Select date range</strong>
			</div>
			<div class="panel-body">
			    {{ Form::open(['route' => 'report/devolutionsByDate', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
			      <div class="form-group">
			        {{ Field::date('from') }}
			      </div>
			      <div class="form-group">
			        {{ Field::date('to') }}
			      </div>
			      <button type="submit" class="btn btn-primary">Generate report</button>
			    {{ Form::close() }}
			</div>
		</div>

	@if(isset($list))
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Order</th>
						<th>Created at</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list as $detail)
						<tr>
							<td>
								<strong>
									#{{ Format::code($detail->order->id) }}
								</strong>
							</td>
							<td>{{ Format::date($detail->created_at) }}</td>
							<td>{{ $detail->product->name }}</td>
							<td>{{ $detail->quantity }}</td>
							<td style="text-align:right;">{{ $detail->total_price }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	@endif

	</div>

@stop