@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Delivery orders list</h2>
  <p>

  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Order</th>
      <th>Customer</th>
      <th>Delivery date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($list as $order)
      <tr>
        <td>{{ Format::code($order->order_id) }}</td>
        <td>{{ $order->customer->full_name }}</td>
        <td>{{ $order->delivery_date }}</td>
        <td>{{ $order->status }}</td>
        <td width="150">
          <div class="btn-group" role="group">
	          <a href="{{ route('orders/view', [$order->order_id])}}" class="btn btn-xs btn-primary">
	          see
	          </a>
            @if( $order->status == 'out for delivery' )
	          <a href="{{ route('deliverySend', [$order->order_id])}}" class="btn btn-xs btn-success">
	          delivered
	          </a>
            @else
            <a href="{{ route('deliveryBack', [$order->order_id])}}" class="btn btn-xs btn-danger">
            out for delivery
            </a>
            @endif


          </div>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{ $list->links() }}





</div>
@stop