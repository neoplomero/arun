@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  @if(isset($response))
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{$response}}</div>
  @endif
  
  <h2>Orders List</h2>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Order</th>
      <th>Customer</th>
      <th>Interval</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($list as $cron)
      <tr>
        <td>{{ Format::code($cron->order->id) }}</td>
        <td>{{ $cron->order->customer->full_name }}</td>
        @if($cron->interval == 'daily')
		<td>{{ $cron->interval }}</td>
        @else
		<td>{{ $cron->interval }} (every {{ Format::getDay($cron->order->delivery_date) }})</td>
        @endif
        
        <td width="160">
          <div class="btn-group" role="group">
	          <a href="{{ route('orders/view', [$cron->order->id])}}" class="btn btn-xs btn-primary">
	          see
	          </a>
	          <a href="{{ route('detail', [$cron->order->order_id])}}" class="btn btn-xs btn-warning">
	          delete
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