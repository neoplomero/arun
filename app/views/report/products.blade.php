@extends('layout')

@section('content')

	<div class="container">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Select date range</strong>
			</div>
			<div class="panel-body">
			    {{ Form::open(['route' => 'report/searchProductSales', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
			      <div class="form-group">
			        {{ Field::date('from') }}
			      </div>
			      <div class="form-group">
			        {{ Field::date('to') }}
			      </div>
			      <button type="submit" class="btn btn-primary">Generate chart</button>
			    {{ Form::close() }}
			</div>
		</div>
@if(isset($chart_data))
@foreach ($chart_data as $chart)

		<center>
		<div style="width:50%">
			<div>
				<canvas id="canvas{{ $chart['product'] }}" height="450" width="600"></canvas>
			</div>
		</div>
		</center>

	
	
	<script>

		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : [{{ $chart['labels'] }}],
			datasets : [
				
				{
					label: "Sales",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [{{ $chart['data']}}]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas{{ $chart['product'] }}").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
	</script>
	@endforeach
	@endif

</div>


@stop