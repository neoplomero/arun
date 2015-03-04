@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">
  @if(Session::get('response'))
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('response')}}</div>
  @endif
  
  <h2>Model Orders List</h2>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Order</th>
      <th>Customer</th>
      <th>Ammount</th>
      <th>Delivery date</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($list as $order)
      <tr>
        <td>{{ Format::code($order->id) }}</td>
        <td>{{ $order->customer->full_name }}</td>
        <td>{{ $order->amount }}</td>
        <td width="320">
        	{{ Form::open(['route' => 'standing/create', 'method' => 'POST', 'role' => 'search', 'class' => 'form-inline']) }}
			  <div class="form-group">
			  	{{ Form::hidden('order_id', $order->id )}}
			  	{{ Form::input('date','delivery_date','', array('class' => 'form-control')) }}
			  </div>
			  <button type="submit" class="btn btn-default">Send to stagin</button>
			{{ Form::close() }}
        </td>
        <td width="160">
          <div class="btn-group" role="group">
	          <a href="{{ route('detail', [$order->id])}}" class="btn  btn-warning">
	          edit
	          </a>
            <a href="{{ route('invoice', [$order->id])}}" class="btn  btn-info">
            view
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