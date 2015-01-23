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


  <h2>Devolutions List</h2>

  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Created at</th>
      <th>Product</th>
      <th>Quanity</th>
      <th>Amount</th>
    </tr>
    </thead>
    <tbody>

  @foreach ($list as $detail)
      <tr>
        <td>{{ Format::date($detail->created_at) }}</td>
        <td>{{ $detail->product->name }}</td>
        <td>{{ $detail->quantity }}</td>
        <td>{{ $detail->total_price }}</td>

      </tr>
  @endforeach
	

    </tbody>
  </table>

{{ $list->links() }}




</div>
@stop