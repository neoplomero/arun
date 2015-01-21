@extends('layout')

@section('content')

	<div class="container">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Select date range</strong>
			</div>
			<div class="panel-body">
			    {{ Form::open(['route' => 'report/searchSales', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
			      <div class="form-group">
			        {{ Field::date('from') }}
			      </div>
			      <div class="form-group">
			        {{ Field::date('to') }}
			      </div>
			      <div class="form-group">
					{{ Field::select('type', ['chart' => 'chart', 'list' => 'list']) }}
			      </div>
			      <button type="submit" class="btn btn-primary">Generate report</button>
			    {{ Form::close() }}
			</div>
		</div>

		@if(isset($data))
		<center>
		<div style="width:50%">
			<div>
				<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>
		</center>
			<script>

				var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
				var lineChartData = {
					labels : [{{ $labels }}],
					datasets : [
						
						{
							label: "Sales",
							fillColor : "rgba(151,187,205,0.2)",
							strokeColor : "rgba(151,187,205,1)",
							pointColor : "rgba(151,187,205,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(151,187,205,1)",
							data : [{{ $data }}]
						}
					]

				}

			window.onload = function(){
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myLine = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});
			}
			</script>
		@endif
	
	
	

	@if(isset($orders))
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Order</th>
						<th>Created at</th>
						<th>Customer</th>
						<th>Payment</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
						<tr>
							<td>{{ Format::code($order->id) }}</td>
							<td>{{ Format::date($order->created_at) }}</td>
							<td>{{ $order->customer->full_name}}</td>
							<td>{{ $order->payment }}</td>
							<td style="text-align:right;">{{ $order->amount }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	@endif

	</div>

@stop