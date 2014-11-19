@extends('layout')

@section('content')

<div class="container">

	<div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <strong>Atention !</strong> You have an open order waiting for sending.
    </div>

	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>General information</h4></div>
			  <div class="panel-body">
				<address>
				  <strong>{{ $bakery->name }}</strong><br>
				  {{ $bakery->address }}<br>
				  <abbr title="Phone">P:</abbr> {{ $bakery->phone_number }}<br>
				  <a href="mailto:{{ $bakery->email }}">{{ $bakery->email }}</a><br>
				  <abbr title="Register">Register Number:</abbr> {{ $bakery->register_number }}				  
				</address>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Customer information</h4></div>
			  <div class="panel-body">
				<address>
				  <strong>Contact information.</strong><br>
				  {{ $order->customer->full_name }}<br>
				  <abbr title="Phone">P:</abbr> {{ $order->customer->phone_number }}<br>
				  <a href="mailto:{{ $order->customer->email }}">{{ $order->customer->email }}</a><br>
				  <abbr title="Register">Register Number:</abbr> {{ $order->customer->register_number }}
				</address>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Order Information</h4></div>
			  <div class="panel-body">
				<address>
				  <strong>Delivery address.</strong><br>
				  {{ $order->delivery_address }}<br>
				  {{ $status->status }}<br>
				  Total invoice : {{ $order->amount; }}
				</address>
			  </div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>Order summary</strong></h4>
                    <div class="btn-group pull-right invoice-actions">
                    	<div class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Add</div>
                    	<a href="{{ route('send', [$order->id]) }}" class="btn btn-success btn-xs">send</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                	<td></td>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>

								@foreach ($order->detail as $detail)   
                                <tr>
                                	<td>
	                                	<div class="btn-group ">
					                    	<a href="{{ route('removeDetail', [$detail->id] ) }}" class="btn btn-danger btn-xs">Delete</a>
					                    	<div class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal{{ $detail->id }}">Update</div>
					                    </div>
				                    </td>
                                    <td>{{ $detail->product->name }}</td>
                                    <td class="text-center">{{ $detail->single_price}}</td>
                                    <td class="text-center">{{ $detail->quantity }}</td>
                                    <td class="text-right">{{ $detail->total_price }}</td>
                                </tr>


                                @endforeach
                                <tr>
                                	<td></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
                                    <td class="emptyrow text-right">{{ $order->amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add product</h4>
	      </div>
	      <div class="modal-body">


				{{ Form::open(['route' => 'newDetail', 'method' => 'POST', 'role' => 'form']) }}

				<fieldset>

				{{ form::hidden('order_id', $order->id) }}
				
				{{ Field::select('product' , $products ) }}

				{{ Field::number('quantity') }}

				</fieldset>
				<br>
				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<button class="btn btn-danger" data-dismiss="modal"> Cancel </button>
				</div>

				{{ Form::close() }}
			

	      </div>

	    </div>
	  </div>
	</div>


	<!-- Updates -->

	@foreach($order->detail as $detail)
	<div class="modal fade" id="myModal{{ $detail->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Update row</h4>
	      </div>
	      <div class="modal-body">


				{{ Form::model($detail, ['route' => 'updateDetail', 'method' => 'PUT', 'role' => 'form']) }}

				<fieldset>
			
				<strong>Product name: </strong> {{ $detail->product->name }}<br>

				{{ form::hidden('id', $detail->id) }}
				
				{{ Field::text('single_price' , $detail->single_price ) }}

				{{ Field::number('quantity') }}

				</fieldset>
				<br>
				<div class="">
					<input type="submit" value="Update" class="btn btn-success">

					<button class="btn btn-danger" data-dismiss="modal"> Cancel </button>
				</div>

				{{ Form::close() }}
			

	      </div>

	    </div>
	  </div>
	</div>
	@endforeach

			
</div>
@endsection