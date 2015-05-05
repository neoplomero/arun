@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">
  @if(Session::get('response'))
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('response')}}</div>
  @endif

  <h2>Orders List</h2>
  <p>

    {{ Form::open(['route' => 'orders/search', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
      <div class="form-group">
        {{ Field::text('customer','',array('placeholder' => 'name')) }}
        {{ Field::date('delivery_date','',array('placeholder' => 'date')) }}
        {{ Field::date('billing_date','',array('placeholder' => 'date')) }}
        {{ Field::select('payment', ['pending payment' => 'unpaid', 'paid' => 'paid']) }}
      </div>
      <button type="submit" class="btn btn-sm btn-primary">Search</button>
      <a href="{{ route('orders/list') }}" class="btn btn-sm btn-success">Default</a>
    {{ Form::close() }}

  </p>

  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Order</th>
      <th>Customer</th>
      <th>Updated by</th>
      <th>Delivery date</th>
      <th>Status</th>
      <th>Payment</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($list as $order)
      <tr>
        <td>{{ Format::code($order->order_id) }}</td>
        <td>{{ $order->customer->full_name }}</td>
        <td>{{ $order->user->full_name }}</td>
        <td>{{ Format::date($order->delivery_date) }}</td>
        <td>{{ $order->status }}</td>
        <td>

          @if($order->payment == 'pending payment')
          <a href="{{ route('order/paid', [$order->order_id])}}" class="btn btn-xs btn-success">
            unpaid
          </a>
          @else
          <a href="{{ route('order/restore', [$order->order_id])}}" class="btn btn-xs btn-danger">
            set as paid
          </a>
          @endif

        </td>
        <td>{{ $order->email }}</td>

        <td width="160">
          <div class="btn-group" role="group">
	          <a href="{{ route('orders/view', [$order->order_id])}}" class="btn btn-xs btn-primary">
	          see
	          </a>
	          <a href="{{ route('detail', [$order->order_id])}}" class="btn btn-xs btn-warning">
	          edit
	          </a>
            <a href="{{ route('invoice', [$order->order_id])}}" class="btn btn-xs btn-info">
            print
            </a>
            <a href="{{ route('sendInvoice', [$order->order_id, $order->customer->email])}}" class="btn btn-xs btn-success">
            email
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