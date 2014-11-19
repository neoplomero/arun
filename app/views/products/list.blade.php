@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Products List</h2>
  <p>
  <a href="{{ route('products/register') }}" class="btn btn-success pull-right">Add New</a>
  </p>
  <br></br>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($productsList as $product)
      <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td width="50">
          <a href="{{ route('products/view', [$product->id])}}" class="btn btn-xs btn-warning">
          edit
          </a>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{ $productsList->links() }}





</div>
@stop