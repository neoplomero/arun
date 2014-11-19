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
                        Reg : {{ $order->customer->phone_number }}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>{{ $bakery->name }}</strong><br>
    					{{ $bakery->address }}<br>
                        {{ $bakery->phone_number }}<br>
                        {{ $bakery->email }}<br>
                        Reg: {{ $bakery->register_number }}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Shipped To::</strong><br>
                        {{ $order->delivery_address }}<br>
                        Status:     <strong>{{ $order->status->get(count($order->status) - 1 )->status }}</strong><br>
                        Delivery date: {{ $order->delivery_date }}<br>

    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ $order->created_at }}<br><br>
    				</address>
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
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                @foreach($order->detail as $detail)
    							<tr>
    								<td>{{ $detail->product->name }}</td>
    								<td class="text-center">{{ $detail->single_price }}</td>
    								<td class="text-center">{{ $detail->quantity }}</td>
    								<td class="text-right">{{ $detail->total_price }}</td>
    							</tr>
                                @endforeach


    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right"> {{ $order->amount }}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

@endsection