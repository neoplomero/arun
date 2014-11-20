@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Customers List</h2>
  <p>

    
    {{ Form::open(['route' => 'customerSearch', 'method' => 'POST', 'role' => 'search', 'class' => 'navbar-form navbar-left']) }}
      <div class="form-group">
        {{ Field::text('name','',array('placeholder' => 'name')) }}
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  <a href="{{ route('customers/register') }}" class="btn btn-success pull-right">Add New</a>
  </p>
  <br></br>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Name</th>
      <th>E-mail</th>
      <th>Phone</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($customerList as $customer)
      <tr>
        <td>{{ $customer->full_name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone_number }}</td>
        <td width="50">
          <a href="{{ route('customers/view', [$customer->id])}}" class="btn btn-xs btn-primary">
          see
          </a>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{ $customerList->links() }}





</div>
@stop