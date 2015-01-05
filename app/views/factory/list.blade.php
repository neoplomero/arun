@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Processing orders List</h2>
  <p>

    {{ Form::open(['route' => 'factorySearch', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
      <div class="form-group">
        {{ Field::date('delivery_date','',array('placeholder' => 'delivery date')) }}
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}

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
        <td width="140">
          <div class="btn-group" role="group">
	          <a href="{{ route('factory/view', [$order->order_id])}}" class="btn btn-xs btn-primary">
	          see
	          </a>

	          @if ($order->status == 'out for delivery')
            <a href="{{ route('factoryBack', [$order->order_id])}}" class="btn btn-xs btn-danger">
	          processing
	          </a>
            @elseif ($order->status == 'processing') 
            <a href="{{ route('factorySend', [$order->order_id])}}" class="btn btn-xs btn-success">
            send
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