@extends('layout')

@section('content')



<div class="container">


  <h2>Sales Summary</h2>
  <p>
    {{ Form::open(['route' => 'report/summary/search', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-left']) }}
        
      <div class="form-group">
        {{ Field::date('from') }}
      </div>
      <div class="form-group">
        {{ Field::date('to') }}
      </div>
      <div class="form-group">
          {{ Field::select('payment', ['all' => 'all', 'paid' => 'paid', 'pending payment' => 'pending payment' ]) }}
      </div>
      <div class="form-group">
          {{ Field::select('type', ['plain' => 'plain', 'pdf' => 'pdf' ]) }}
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    {{ Form::close() }}
  </p>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Delivery/Invoice Docket</th>
      <th>Created at</th>
      <th>Customer</th>
      <th>Payment</th>
      <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($orders))
		@foreach($orders as $order)
		  <tr>
		    <td>
		      <strong>
		        #{{ Format::code($order->id) }}
		      </strong>
		    </td>
		    <td>{{ Format::date($order->created_at) }}</td>
		    <td>{{ $order->customer->full_name }}</td>
		    <td>{{ $order->payment }}</td>
        <td style="text-align:right;">{{ $order->amount }}</td>

		  </tr>
		@endforeach
    @endif

    </tbody>
  </table>


  @if(isset($orders))
     {{$orders->links() }}
  @endif


</div>
@stop