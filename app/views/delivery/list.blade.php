@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Customers List</h2>
  <p>

  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Order</th>
      <th>Customer</th>
      <th>Date</th>
      <th>Delivery date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($list as $order)
      <tr>
        <td>{{ Format::code($order->id) }}</td>
        <td>{{ $order->customer->full_name }}</td>
        <td>{{ $order->created_at }}</td>
        <td>{{ $order->delivery_date }}</td>
        <td>{{ $order->status }}</td>
        <td width="100">
          <div class="btn-group" role="group">
	          <a href="{{ route('orders/view', [$order->id])}}" class="btn btn-xs btn-primary">
	          see
	          </a>
	          <a href="{{ route('detail', [$order->id])}}" class="btn btn-xs btn-warning">
	          edit
	          </a>
          </div>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{ $list->links() }}





</div>
@stop