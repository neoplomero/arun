@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Production order</h2>
  <p>


  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($orders as $item)
      <tr>
        <td>{{ $item['product'] }}</td>
        <td>{{ $item['quantity'] }}</td>
      </tr>
  @endforeach
    </tbody>
  </table>



</div>
@stop