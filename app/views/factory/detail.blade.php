@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{ Format::code($order->id) }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					{{ $order->customer->full_name }}<br>
    					{{ $order->customer->delivery_address }}<br>
                        {{ $order->customer->email }}<br>
                        {{ $order->customer->phone_number }}<br>
                        Reg : {{ $order->customer->register_number }}<br>
    				</address>
					<div class="btn-group" >
    				@if ($order->status->last()->status == 'out for delivery')
		            <a href="{{ route('factoryBack', [$order->id])}}" class="btn btn-md btn-success">
			          processing
			          </a>
		            @elseif ($order->status->last()->status == 'processing') 
		            <a href="{{ route('factorySend', [$order->id])}}" class="btn btn-md btn-danger">
		            send
		            </a>
		            @endif
		            <a href="{{ route('factoryOrders')}}" class="btn btn-primary btn-md">go back</a>

		            </div>
					<p></p>
    			</div>
    			
    		</div>
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                @foreach($order->detail as $detail)
    							<tr>
    								<td>{{ $detail->product->name }}</td>
    								<td class="text-center">{{ $detail->quantity }}</td>
    							</tr>
                                @endforeach


    							
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

@endsection