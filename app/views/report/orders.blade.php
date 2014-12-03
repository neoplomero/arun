@extends('layout')

@section('content')



<div class="container">

  <div class="panel panel-default">
    <div class="panel-heading"><h4>Customer information</h4></div>
    <div class="panel-body">

    <address>
      <strong>Contact information.</strong><br>
      {{ $customer->full_name }}<br>
      <abbr title="Phone">P:</abbr> {{ $customer->phone_number }}<br>
      <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a><br>
      <abbr title="Register">Register Number:</abbr> {{ $customer->register_number }}<br>
      <strong>Payment period:</strong> {{$customer->payment_period}}
    </address>

    <address>
      <strong>Invoice address.</strong><br>
      {{ $customer->invoice_address }}<br>
    </address>

    <address>
      <strong>Delivery address.</strong><br>
      {{ $customer->delivery_address }}<br>
    </address>

    
    </div>
  </div>


  <h2>Orders List</h2>
  <p>
    {{ Form::open(['route' => 'report/orders/filter', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
        {{ Form::hidden('customer_id', $customer->id) }}
      <div class="form-group">
        {{ Field::date('from') }}
      </div>
      <div class="form-group">
        {{ Field::date('to') }}
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    {{ Form::close() }}
  </p>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Order</th>
      <th>Created by</th>
      <th>Created at</th>
      <th>Status</th>
      <th>Payment</th>
      <th>Amount</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($orders as $order)

      <tr>
        <td>{{ Format::code($order->id) }}</td>
        <td>{{ $order->status->first()->user->full_name }}</td>
        <td>{{ Format::date($order->created_at) }}</td>
        <td>{{ $order->status->last()->status }}</td>
        <td>
			{{ $order->payment }}
        </td>
        <td style="text-align:right;">{{ $order->amount }}</td>

        <td width="130">
          <div class="btn-group" role="group">
	          <a href="{{ route('orders/view', [$order->order_id])}}" class="btn btn-xs btn-primary">
	          see
	          </a>
            <a href="{{ route('invoice', [$order->order_id])}}" class="btn btn-xs btn-info">
            print
            </a>
          </div>
        </td>
      </tr>
  @endforeach
	
		<tr>
			<td colspan="4"></td>
			<td><strong>Total</strong></td>
			<td style="text-align:right;">{{ $total; }}</td>
		</tr>

    </tbody>
  </table>






</div>
@stop