@extends('layout')

@section('content')


<div class="container">

	<div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <strong>Atention !</strong> You have an open order waiting for sending.
    </div>

	<!-- Modal -->
	<div class="modal fade" id="order_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-body">
				{{ Form::model($order,['route' => 'updateOrder', 'method' => 'PUT', 'role' => 'form']) }}

				<fieldset>

				{{ form::hidden('id', $order->id) }}

				{{ Field::date('delivery_date') }}

				{{ Field::date('billing_date') }}

				{{ Form::label('number', 'Purchase Order Number') }}

				{{ Form::text('number', null, ['class' => 'form-control' ] ) }}

				{{ Field::textarea('delivery_address',$order->delivery_address) }}

				{{ Field::textarea('note',$order->note) }}

				</fieldset>
				<div class="">
					<input type="submit" value="Update" class="btn btn-warning">
					<button class="btn " data-dismiss="modal"> Cancel </button>
				</div>
				{{ Form::close() }}
			</div>
	    </div>
	  </div>
	</div>

	<!--modal-->
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
				<h4>Delete order</h4>
		  	</div>
	    	<div class="modal-body">
				{{ Form::open(['route' => 'order/delete', 'method' => 'POST', 'role' => 'form']) }}

				{{ form::hidden('id', $order->id) }}
				
				<p>sure you want to delete this order ?</p>
				<br>
				<div class="">
					<input type="submit" value="Delete order" class="btn btn-danger">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				{{ Form::close() }}
			</div>
	    </div>
	  </div>
	</div>

	<!--modal-->
	<div class="modal fade" id="new_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
				Create new model
		  	</div>
	    	<div class="modal-body">
				{{ Form::open(['route' => 'standing/createModel', 'method' => 'POST', 'role' => 'form']) }}

				<fieldset>

				{{ form::hidden('id', $order->id) }}

				{{ Field::text('model_name','') }}

				</fieldset>
				<div class="">
					<input type="submit" value="Save this model" class="btn btn-success">
					<button class="btn" data-dismiss="modal"> Cancel </button>
				</div>
				{{ Form::close() }}
			</div>
	    </div>
	  </div>
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
				  @if($order->number)
				  <strong>Purchase order Number </strong>{{ $order->number }}<br>
				  @endif
				  <strong>Delivery date : </strong>{{ $order->delivery_date }}<br>
				  @if($order->billing_date)
				  <strong>Billing date : </strong>{{ $order->billing_date }}<br>
				  @endif
				  <strong>Total invoice : </strong> {{ $order->amount; }}</br>
				</address>
				<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#order_detail">
				  Edit this
				</button>
				<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#new_model">
				  Copy as model
				</button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
				  Delete this order
				</button>
				<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#credit">
				  add credit
				</button>
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
						
                    	<div class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addProduct">Add</div>
                    	
                    	@if($order->type === "order")
                    	<a href="{{ route('send', [$order->id]) }}" class="btn btn-success btn-xs">send</a>
                    	@endif
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
								@section('')
								{{ $sales=0 }}
								@endsection
								@foreach ($order->detail as $detail)  
								@if($detail->type =='sale') 
								@section('')
								{{ $sales = $sales + $detail->total_price }}
								@endsection

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

								@endif
                                @endforeach
                                <tr>
                                	<td></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>sub-Total</strong></td>
                                    <td class="emptyrow text-right">{{ $sales }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>

	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>Returns</strong></h4>
                    <div class="btn-group pull-right invoice-actions">
                    
                    	<div class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addDevolution">Add</div>
                    
                    @if($order->type === "order")
                    	<a href="{{ route('send', [$order->id]) }}" class="btn btn-success btn-xs">send</a>
                   	@endif
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
                            	@section('')
								{{ $return = 0 }}
								{{ $credit = 0 }}
								@endsection
								@foreach ($order->detail as $detail)  
								@if($detail->type =='devolution') 
								@section('')
								{{ $return = $return + $detail->total_price }}
								@endsection
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
                                    <td class="text-right">-{{ $detail->total_price }}</td>
                                </tr>

								@endif
                                @endforeach
                                <tr>
                                	<td></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>sub-Total</strong></td>
                                    <td class="emptyrow text-right">-{{ $return }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>



	<div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="text-align:right;">
                    <div class="col-md-3 col-md-offset-6 col-lg-3 col-lg-offset-6">
                    	<strong>Sale</strong>
                    </div>
                    <div class="col-md-3 col-lg-3 " style="text-align:right;">
                    	{{$sales}}
                    </div>
                    <div class="col-md-3 col-md-offset-6 col-lg-3 col-lg-offset-6">
                    	<strong>Returns</strong>
                    </div>
                    <div class="col-md-3 col-lg-3 " style="text-align:right;">
                    	-{{$return}}
                    </div>
					<?php $credit = 0 ?>
                    @foreach ($order->detail as $det)  
						@if($det->type =='credit') 
	                    <div class="col-md-3 col-md-offset-6 col-lg-3 col-lg-offset-6">
	                    	<strong>Credit</strong>
	                    </div>
	                    <div class="col-md-3 col-lg-3 " style="text-align:right;">
	                    	-{{ $credit =  $det->total_price }}
	                    </div>
						
						@endif
						
					@endforeach
                    <div class="col-md-3 col-md-offset-6 col-lg-3 col-lg-offset-6">
                    	<strong>Total</strong>
                    </div>
                    <div class="col-md-3 col-lg-3 " style="text-align:right;">
                    	{{$sales - $return - $credit }}
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
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

				{{ Field::text('type', 'sale',['readonly'])}}

				</fieldset>
				<br>
				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<button class="btn " data-dismiss="modal"> Cancel </button>
				</div>

				{{ Form::close() }}
			

	      </div>

	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="addDevolution" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add product for devolution</h4>
	      </div>
	      <div class="modal-body">


				{{ Form::open(['route' => 'newDetail', 'method' => 'POST', 'role' => 'form']) }}

				<fieldset>

				{{ form::hidden('order_id', $order->id) }}
				
				{{ Field::select('product' , $products ) }}

				{{ Field::number('quantity') }}

				{{ Field::text('type', 'devolution',['readonly'])}}

				</fieldset>
				<br>
				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<button class="btn " data-dismiss="modal"> Cancel </button>
				</div>

				{{ Form::close() }}
			

	      </div>

	    </div>
	  </div>
	</div>



	<!-- Updates -->

	@foreach($order->detail as $detail)
	@if($detail->type != 'credit')
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

				{{ Field::select('type', ['sale'=>'sale','devolution'=>'devolution']) }}

				</fieldset>
				<br>
				<div class="">
					<input type="submit" value="Update" class="btn btn-success">

					<button class="btn " data-dismiss="modal"> Cancel </button>
				</div>

				{{ Form::close() }}
			

	      </div>

	    </div>
	  </div>
	</div>
	@endif
	@endforeach


	<!-- Modal -->
	<div class="modal fade" id="credit" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Add credit</h4>
	      </div>
	      <div class="modal-body">


				{{ Form::open(['route' => 'newCredit', 'method' => 'POST', 'role' => 'form']) }}

				<fieldset>

				{{ form::hidden('order_id', $order->id) }}
				
				{{ Field::text('ammount'  ) }}

				</fieldset>
				<br>
				<div class="">
					<input type="submit" value="Register" class="btn btn-success">

					<button class="btn " data-dismiss="modal"> Cancel </button>
				</div>

				{{ Form::close() }}
			

	      </div>

	    </div>
	  </div>
	</div>
			
</div>
@endsection