@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Orders List</h2>
  <p>

    
    {{ Form::open(['route' => 'orders/aspdf', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
      <div class="form-group">
        {{ Field::date('delivery_date','',array('placeholder' => 'date')) }}
      </div>
      <button type="submit" class="btn btn-primary">Generate pdf</button>
    {{ Form::close() }}

  </p>









</div>
@stop