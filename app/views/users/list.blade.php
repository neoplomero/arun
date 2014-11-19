@extends('layout')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

  
  <h2>Users List</h2>
  <p>
  <a href="{{ route('users/register') }}" class="btn btn-success pull-right">Add New</a>
  </p>
  <br></br>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>Name</th>
      <th>E-mail</th>
      <th>Type</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
  @foreach ($userList as $user)
      <tr>
        <td>{{ $user->full_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->user_type }}</td>
        <td width="50">
          <a href="{{ route('users/view', [$user->id])}}" class="btn btn-xs btn-primary">
          see
          </a>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>

  {{ $userList->links() }}





</div>
@stop